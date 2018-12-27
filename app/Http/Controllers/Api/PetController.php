<?php

namespace App\Http\Controllers\Api;

use \App\Pet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Traits\RestControllerTrait;
use App\Http\Requests\Pets\StorePetRequest;

class PetController extends Controller
{
    use RestControllerTrait;

    private $storagePath = '/images/pets';
    /**
     * Retorna una lista de mascotas.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $data = Pet::orderBy('created_at', 'ASC')
                ->with('User')
                ->paginate(6);

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StorePetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePetRequest $request)
    {
        $newPet = new Pet($request->all());
        $newPet->uid = Str::uuid();
        $newPet->user_uid = $request->user()->uid;


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
     * Registra una imagen subida al servidor a la base de datos
     *
     * @param String $filename
     * @param String $uid
    */
    private function registerImage(String $filename, String $uid) {
        $image = new \App\ImagesPet();
        $image->uid = Str::uuid();
        $image->pet_uid = $uid;
        $image->filename = $filename;
        $image->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  String  $uid
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet) {
        return $this->successResponse($pet);
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
