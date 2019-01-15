<?php

namespace App\Http\Controllers\Admin;

use \App\Pet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetController extends Controller
{

    public function index()
    {
        $pets = \App\Pet::whereNull('approved_at')->get();

        return view('admin.pets.index', compact('pets'));
    }

    public function approve($uid)
    {
        $pet = Pet::find($uid);

        $pet->approved_at = now();

        $pet->update();

        return back();
    }

    public function reject($uid)
    {
        $pet = Pet::find($uid);

        $pet->delete();

        return back();
    }
}
