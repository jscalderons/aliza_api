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
    public function index(Request $request)
    {
        $sites = Minisite::with('user');
        $queries = [];

        // Filtrar
        if ($request->has('filters'))
        {
            if (array_has($request->filters, 'category_id')
                && $request->filters['category_id'] !== null)
            {
                $sites->where('category_id', $request->filters['category_id']);
                $queries['category_id'] = $request->filters['category_id'];
            }
        }

        // Buscador
        if ($request->has('query') && $request->input('query') !== null)
        {
            $sites->search($request->input('query'));
            $queries['query'] = $request->input('query');
        }

        // Posicionamiento
        if ($request->has('latitude')
            && $request->latitude !== null
            && $request->has('longitude')
            && $request->longitude !== null)
        {
            $sites->sortByCoordinates($request->latitude, $request->longitude);
            $queries['latitude'] = $request->latitude;
            $queries['longitude'] = $request->longitude;
        }

        // Ordenamiento
        if ($request->has('sort') && $request->sort !== null)
        {
            $sites->orderBy('created_at', $request->sort);
            $queries['sort'] = $request->sort;
        }
        else if ($request->has('latitude')
            && $request->latitude !== null
            && $request->has('longitude')
            && $request->longitude !== null)
        {
            $sites->orderBy('distance', 'ASC');
        }
        else
        {
            $sites->latest('created_at');
        }

        return response($sites->paginate(env('PAGINATE', 6))->appends($queries));
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
            if ($filename = $this->storeImage($request->image, $site->uid))
            {
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
