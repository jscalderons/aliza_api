<?php

namespace App\Http\Controllers\Admin;

use \App\Pet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetController extends Controller
{

    public function list()
    {
        $pets = \App\Pet::whereNull('approved_at')->get();

        return view('admin.pets.list', compact('pets'));
    }

    public function approve($uid)
    {
        $pet = Pet::find($uid);

        $pet->approved_at = now();

        $pet->update();

        return back();
    }
}
