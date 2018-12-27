<?php

namespace App\Http\Controllers\Api;

use \App\Minisite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\RestControllerTrait;

class MinisiteController extends Controller
{
    use RestControllerTrait;

    private $storagePath = '/images/sites';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $minisites = Minisite::orderBy('created_at', 'ASC')
                                ->with('category')
                                ->with('user')
                                ->paginate(6);

        return response()->json($minisites);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newSite = new Minisite($request->all());

        $newSite->uid = Str::uuid();
        $newSite->user_uid = $request->user()->uid;

        if ($newSite->save()) {
            $filename = $this->uploadBase64Image($request->image, $newSite->uid, $this->storagePath);

            $newSite->image = $filename;

            $newSite->update();
        }

        return $this->successResponse($newSite);
    }

    public function visit() {

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
