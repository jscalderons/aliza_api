<?php

namespace App\Http\Controllers\Api;

use \App\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\RestControllerTrait;

class PostController extends Controller
{
    use RestControllerTrait;

    private $storagePath = 'posts';


    public function index()
    {
        $posts = Post::latest('created_at')->paginate(6);

        return response($posts);
    }

    public function store(Request $request)
    {
        $newPost = new Post($request->all());
        $newPost->uid = Str::uuid();
        $newPost->user_uid = auth()->user()->uid;

        if ($newPost->saveOrFail()) {
            $newPost->image = $this->uploadBase64Image($request->image, $newPost->uid, $this->storagePath);

            $newPost->update();
            return $this->createdResponse();
        }

        return $this->errorResponse();
    }
}
