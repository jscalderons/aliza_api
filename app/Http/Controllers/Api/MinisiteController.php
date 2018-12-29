<?php

namespace App\Http\Controllers\Api;

use \App\Minisite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\RestControllerTrait as RESTTrait;
use App\Http\Traits\ImagesControllerTrait as ImagesTrait;

class MinisiteController extends Controller
{
    use RESTTrait, ImagesTrait;

    private $storageFolder = 'sites';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Minisite::latest('created_at')
                                ->with('user');

        foreach ($sites as $$site) {
            $site->user->makeHidden('api_token');
        }

        return response($sites->paginate(6));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $site = new Minisite($request->all());
        $site->uid = Str::uuid();
        $site->user_uid = auth()->user()->uid;

        if ($site->save())
        {
            if ($filename = $this->storeImage($request->image, $site->uid)) {
                $site->image = $filename;
                $site->update();
            }

            return $this->createdResponse();
        }

        return $this->errorResponse('El sitio no pudo ser guardado.');
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
        $site = Minisite::find($uid);

        if ($site->update($request->all()))
        {
            if ($request->has('image'))
            {
                if ($filename = $this->storeImage($request->image, $site->uid))
                {
                    if ($this->destroyImage($uid, $site->image))
                    {
                        $site->image = $filename;
                        $site->update();
                    }
                }
            }

            return $this->successResponse($site);
        }

        return $this->errorResponse('El sitio no pudo ser guardado.');
    }

    /**
     * decodifica de base64 y almacena imagenes
     *
     * @param Array $images
     * @param String $uid
     * @return String
     * @return Null
    */
    private function storeImage(String $base64Images, String $uid)
    {
        $image = $this->base64ImageDecoder($base64Images);

        if ($image)
        {
            $path = "{$this->storageFolder}/{$uid}";
            $filename = $this->generateFilename();

            return $this->uploadImage($image, $path, $filename) ? $filename : null;
        }

        return null;
    }

    public function destroyImage(String $uid, String $filename)
    {
        $path = "{$this->storageFolder}/{$uid}";

        return $this->deleteImage($path, $filename);
    }

}
