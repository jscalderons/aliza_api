<?php

namespace App\Http\Controllers\Admin;

use \App\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\ImagesControllerTrait as ImagesTrait;

class PostController extends Controller
{
    use ImagesTrait;

    private $storageFolder = 'posts';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post($request->all());
        $post->uid = Str::uuid();
        $post->user_uid = auth()->user()->uid;

        if ($request->hasFile('image')) {
            $post->image = $this->generateFilename();
            $this->uploadImage($request->image, "{$this->storageFolder}/{$post->uid}", $post->image);
        }

        $post->save();

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
        $post = Post::find($uid);

        return view('admin.posts.edit', compact('post'));
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
        $post = Post::find($uid);

        if ($request->hasFile('image'))
        {
            $path = "{$this->storageFolder}/{$uid}";
            $post->image = $this->generateFilename();

            if ($this->uploadImage($request->image, $path, $post->image))
            {
                $this->deleteImage($path, $post->getOriginal('image'));
            }
        }

        $post->update($request->all());

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
        //
    }
}
