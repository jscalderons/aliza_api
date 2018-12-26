<?php

namespace App\Http\Controllers\Api;

use \App\Pet;
use \App\ImagesPet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    private $storagePath = '/images/pets';
    /**
     * Retorna una lista de mascotas.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        $pets = Pet::orderBy('created_at', 'ASC')
                ->with('images')
                ->with('User')
                ->paginate(6);

        return response()->json($pets);
    }

    /**
     * Retorna una lista de mascotas del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAllByUser(Request $request) {
        $userPets = Pet::orderBy('created_at', 'ASC')
                    ->where('user_uid', $request->user()->uid)
                    ->with('images')
                    ->with('User')
                    ->paginate(6);

        return response($userPets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPet = new Pet();
        $newPet->uid = Str::uuid();
        $newPet->user_uid = $request->user()->uid;
        $newPet->process_id = $request->process_id;
        $newPet->name = $request->name;
        $newPet->phone = $request->phone;
        $newPet->months = $request->months;
        $newPet->sterilized = $request->sterilized;
        $newPet->vaccinated = $request->vaccinated;
        $newPet->sex = $request->sex;
        $newPet->description = $request->description;
        $newPet->city = $request->city;
        $newPet->longitude = $request->longitude;
        $newPet->latitude = $request->latitude;

        if ($newPet->save()) {
            $this->storeImages($request->images, $newPet->uid);
        }

        return response($newPet);
    }

    /**
     * Convierte y almacena una o varias imagenes en base64 a la ruta publica del store
     *
     * @param Array $images
     * @param String $uid
    */
    private function storeImages(Array $images, String $uid) {

        foreach ($images as $base64_image) {
            if (preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {
                $data = substr($base64_image, strpos($base64_image, ',') + 1);
                $data = base64_decode($data);

                $filename = str_random(10) . ".jpg";

                $stored = Storage::disk('public')->put("{$this->storagePath}/{$uid}/{$filename}", $data);

                if ($stored) {
                    $this->registerImage($filename, $uid);
                }
            }
        }
    }

    /**
     *
    */
    public function registerImage(String $filename, String $uid) {
        $image = new ImagesPet();
        $image->uid = Str::uuid();
        $image->pet_uid = $uid;
        $image->filename = $filename;
        $image->save();
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
