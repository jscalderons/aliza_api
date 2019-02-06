<?php

namespace App\Http\Controllers\Api;

use Image;
use \App\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\RestControllerTrait as RESTTrait;
use App\Http\Traits\ImagesControllerTrait as ImagesTrait;

class PostController extends Controller
{
    use RESTTrait, ImagesTrait;

    private $storageFolder = 'posts';


    public function index()
    {
        $posts = Post::latest('created_at');

        return response($posts->paginate(env('PAGINATE', 6)));
    }

    public function store(Request $request)
    {
        $post = new Post($request->all());
        $post->uid = Str::uuid();
        $post->user_uid = auth()->user()->uid;

        if ($post->save())
        {
            if ($filename = $this->storeImage($request->image, $post->uid))
            {
                $post->image = $filename;
                $post->update();
            }

            return $this->createdResponse();
        }

        return $this->errorResponse('No se guardo el registro');
    }

    public function update(Request $request, $uid)
    {
        $post = Post::find($uid);

        if ($post->update($request->all()))
        {
            if ($request->has('image'))
            {
                if ($filename = $this->storeImage($request->image, $post->uid))
                {
                    if ($this->destroyImage($uid, $post->image)) {
                        $post->image = $filename;
                        $post->update();
                    }
                }
            }

            return $this->successResponse($post);
        }

        return $this->errorResponse('No se guardo el registro');
    }

    /**
     * decodifica de base64 y almacena imagenes
     *
     * @param Array $images
     * @param String $uid
     * @return String
     * @return Null
    */
    private function storeImage($image, String $uid)
    {
        $path = "{$this->storageFolder}/{$uid}";
        $filename = $this->generateFilename();

        return $this->uploadImage($image, $path, $filename) ? $filename : null;
    }

    public function destroyImage(String $uid, String $filename)
    {
        $path = "{$this->storageFolder}/{$uid}";

        return $this->deleteImage($path, $filename);
    }
}
