<?php

namespace App\Http\Controllers\Api;

use \App\Pet;
use \App\ImagesPet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pet::orderBy('created_at', 'ASC')
                ->with('images')
                ->with('User')
                ->paginate(6);

        return response()->json($pets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images = $request->images;

        foreach ($images as $image) {
            $image = str_replace('data:image/jpg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            \File::put(storage_path(). '/' . '123.jpg', base64_decode($image));
        }

        dd($images);
        $pet = new Pet();
        $pet->uid = Str::uuid();
        $pet->user_uid = $request->user_uid;
        $pet->process_id = $request->process_id;
        $pet->name = $request->name;
        $pet->phone = $request->phone;
        $pet->months = $request->months;
        $pet->sterilized = $request->sterilized;
        $pet->vaccinated = $request->vaccinated;
        $pet->sex = $request->sex;
        $pet->description = $request->description;
        $pet->city = $request->city;
        $pet->longitude = $request->longitude;
        $pet->latitude = $request->longitude;

        if ($pet->save()) {


            $image = new ImagesPet();
            $image->pet_uid = $pet->uid;

        }

        return response($pet);
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
