<?php

namespace App\Http\Controllers\Api;

use \App\Pet;
use \App\Mail\PetShipped;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Traits\RestControllerTrait as RESTTrait;
use App\Http\Traits\ImagesControllerTrait as ImagesTrait;

class PetController extends Controller
{
    use RESTTrait, ImagesTrait;

    private $storageFolder = 'pets';

    /**
     * Retorna una lista de mascotas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pet::approved();

        // Filtros
        if (request()->has('filters')) {
            foreach (request()->filters as $key => $value) {
                if ($value !== null) {
                    $pets->where($key, $value);
                }
            }
        }

        // Buscador
        if (request()->has('query')  && request()->input('query') !== null) {
            $pets->search(request()->input('query'));
        }

        // Posicionamiento
        if (request()->has('latitude')
            && request()->latitude !== null
            && request()->has('longitude')
            && request()->longitude !== null) {
            $pets->sortByCoordinates(request()->latitude, request()->longitude);
        }

        // Ordenamiento
        if (request()->has('sort') && request()->sort !== null) {
            $pets->orderBy('created_at', request()->sort);
        } else if (request()->has('latitude')
            && request()->latitude !== null
            && request()->has('longitude')
            && request()->longitude !== null) {
            $pets->orderBy('distance', 'ASC');
        } else {
            $pets->latest('created_at');
        }

        return response($pets->paginate(env('PAGINATE', 6))->appends(request()->query()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StorePetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPet = new Pet($request->all());
        $newPet->uid = Str::uuid();
        $newPet->user_uid = auth()->user()->uid;

        if ($newPet->save()) {
            $this->storeImages($request->images, $newPet->uid);
            // Mail::to(env('MAIL_TO'))->send(new PetShipped($newPet));
        }

        return $this->createdResponse($newPet);
    }



    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  String  $uid
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
    {
        $pet = Pet::with('user')->find($uid);

        return $this->successResponse($pet);
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

        if ($pet->update($request->all())) {
            if ($request->has('images')) {
                $this->storeImages($request->images, $pet->uid);
            }

            return $this->successResponse($pet);
        }

        return $this->errorResponse('No se pudo actualizar el registro.');
    }

    public function destroy($uid)
    {
        $pet = Pet::where('uid', $uid)
                    ->where('user_uid', auth()->user()->uid);

        if ($pet->count()) {
            $pet->delete();
            return $this->deletedResponse();
        }

        return $this->notFoundResponse();
    }

    /**
     * decodifica y almacena un arreglo en base64 a imagenes
     *
     * @param Array $images
     * @param String $uid
    */
    private function storeImages(Array $base64Images, String $uid)
    {
        foreach ($base64Images as $image)
        {
            $path = "{$this->storageFolder}/{$uid}";
            $filename = $this->generateFilename();

            if ($this->uploadImage($image, $path, $filename))
            {
                $this->registerImage($filename, $uid);
            }
        }
    }

    /**
     * Registra una imagen subida al servidor a la base de datos
     *
     * @param String $filename
     * @param String $uid
    */
    private function registerImage(String $filename, String $uid)
    {
        $image = new \App\ImagesPet();
        $image->uid = Str::uuid();
        $image->pet_uid = $uid;
        $image->filename = $filename;
        $image->save();
    }

    public function destroyImage(String $uid, String $filename)
    {
        $path = "{$this->storageFolder}/{$uid}";

        if ($this->unregisterImage($uid, $filename))
        {
            if ($this->deleteImage($path, $filename))
            {
                return $this->deletedResponse();
            }
        } else
        {
            return $this->errorResponse('Debes tener almenos una imagen.');
        }

        return $this->notFoundResponse();
    }

     /**
     *  Elimina una imagen del usuario
     *
     * @param String $uid
     * @param String $filename
     * @return Boolean
     */
    private function unregisterImage(String $uid, String $filename)
    {
        $images = \App\ImagesPet::where('pet_uid', $uid);

        if ($images->count() > 1) {
            return $images->where('filename', $filename)->delete();
        }

        return false;
    }

}
