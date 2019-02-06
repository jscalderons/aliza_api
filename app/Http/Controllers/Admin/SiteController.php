<?php

namespace App\Http\Controllers\Admin;

use \App\Site;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\ImagesControllerTrait as ImagesTrait;

class SiteController extends Controller
{
    use ImagesTrait;

    private $storageFolder = 'sites';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::all();

        // dd($sites[0]->category);

        return view('admin.sites.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.sites.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $site = new Site($request->all());
        $site->uid = Str::uuid();
        $site->user_uid = auth()->user()->uid;

        if ($request->hasFile('image'))
        {
            $site->image = $this->generateFilename();
            $this->uploadImage($request->image, "{$this->storageFolder}/{$site->uid}", $site->image);
        }

        if ($site->save())
        {
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
    public function edit(Site $site)
    {
        $categories = Category::all();

        return view('admin.sites.edit', compact('site', 'categories'));
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
        $site = Site::find($uid);

        if ($request->hasFile('image'))
        {
            $path = "{$this->storageFolder}/{$uid}";
            $this->uploadImage($request->image, $path, $site->image);
        }

        if ($site->update($request->all()))
        {
            return $this->edit($site);
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
        //
    }
}
