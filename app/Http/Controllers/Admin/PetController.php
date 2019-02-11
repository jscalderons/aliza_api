<?php

namespace App\Http\Controllers\Admin;

use \App\Pet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\ImagesControllerTrait as ImagesTrait;

class PetController extends Controller
{
    use ImagesTrait;

    private $storageFolder = 'pets';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pet::with(['process', 'user'])
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('admin.pets.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $processes = \App\Process::all();

        return view('admin.pets.create', compact('processes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pet = new Pet();

        $pet->uid = Str::uuid();
        $pet->user_uid = auth()->user()->uid;
        $pet->process_id = $request->process_id;
        $pet->name = $request->name;
        $pet->phone = $request->phone;
        $pet->age = $request->age;
        $pet->sterilized = $request->has('sterilized');
        $pet->vaccinated = $request->has('vaccinated');
        $pet->gender = $request->gender;
        $pet->description = $request->description;
        $pet->location = $request->location;
        $pet->longitude = $request->longitude;
        $pet->latitude = $request->latitude;
        $pet->approved_at = $request->has('approve') ? now() : null;

        if ($pet->save()) {
            if ($request->hasFile('images')) {
                $this->storeImages($request->file('images'), $pet->uid);
            }

            return $this->index();
        }

        return back();
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
        $pet = Pet::with('images')->find($uid);
        $processes = \App\Process::all();

        return view('admin.pets.edit', compact('pet', 'processes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {

        $pet = Pet::find($uid);

        $pet->process_id = $request->process_id;
        $pet->name = $request->name;
        $pet->phone = $request->phone;
        $pet->age = $request->age;
        $pet->sterilized = $request->has('sterilized');
        $pet->vaccinated = $request->has('vaccinated');
        $pet->gender = $request->gender;
        $pet->description = $request->description;
        $pet->location = $request->location;
        $pet->longitude = $request->longitude;
        $pet->latitude = $request->latitude;
        $pet->approved_at = $request->has('approve') ? now() : null;

        if ($pet->update()) {
            if ($request->hasFile('images')) {
                $this->storeImages($request->file('images'), $pet->uid);
            }

            return $this->edit($pet->uid);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    /**
     * Almacena un arreglo en base64 a imagenes
     *
     * @param Array $images
     * @param String $uid
    */
    private function storeImages(Array $images, String $uid)
    {
        foreach ($images as $image) {
            $path = "{$this->storageFolder}/{$uid}";
            $filename = $this->generateFilename();

            if ($this->uploadImage($image, $path, $filename)) {
                $imagesPet = new \App\ImagesPet();

                $imagesPet->uid = Str::uuid();
                $imagesPet->pet_uid = $uid;
                $imagesPet->filename = $filename;

                $imagesPet->save();
            }
        }
    }

    public function upload(Request $request)
    {
        $uid = Str::uuid();
        $path = "{$this->storageFolder}/{$uid}";

        dump($path);
        if ($request->hasFile('files')) {
            $files = $request->file('files');
            foreach ($files as $file) {
                dump($file);
                $filename = $this->generateFilename();
                dump($filename);
                $this->uploadImage($file, $path, $filename);
            }

            return response(['uid' => $uid], 201);
        }

        return response(422);
    }

    /**
     * Aprueba una mascota
     *
     * @param Pet $pet
     * @return Pet
     */
    public function approve(Pet $pet)
    {
        $pet->approved_at = now();

        $pet->update();

        return response($pet);
    }

    /**
     * Rechaza una mascota
     *
     * @param Pet $pet
     * @param Pet
     */
    public function reject(Pet $pet)
    {
        $pet->delete();

        return response($pet);
    }

    /**
     * Restaura una mascota
     *
     * @param Uuid||String $uid
     * @return Pet
     */
    public function restore($uid)
    {
        $pet = Pet::onlyTrashed()
                    ->where('uid', $uid)
                    ->restore();

        return response($pet);
    }

    /**
     * Obtiene la lista de mascotas por aprobar
     *
     * @return Pet[]
     */
    public function getPetListToApproved()
    {
        $pets = Pet::whereNull('approved_at')->with('images')->get();

        return response($pets);
    }

    /**
     * Obtiene la lista de mascotas rechazadas
     *
     * @return Pet[]
     */
    public function getPetListToRejected()
    {
        $pets = Pet::onlyTrashed()->with('images')->get();

        return response($pets);
    }
}
