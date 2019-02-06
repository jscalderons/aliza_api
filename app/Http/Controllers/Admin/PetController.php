<?php

namespace App\Http\Controllers\Admin;

use \App\Pet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetController extends Controller
{

    public function index()
    {
        $pets = Pet::with(['process', 'user'])->paginate(10);

        return view('admin.pets.index', compact('pets'));
    }

    public function approve(Pet $pet)
    {
        $pet->approved_at = now();

        $pet->update();

        return response($pet);
    }

    public function reject(Pet $pet)
    {
        $pet->delete();

        return response($pet);
    }

    public function restore($uid)
    {
        $pet = Pet::onlyTrashed()
                    ->where('uid', $uid)
                    ->restore();

        return response($pet);
    }

    public function getPetListToApproved()
    {
        $pets = Pet::whereNull('approved_at')->with('images')->get();

        return response($pets);
    }

    public function getPetListToRejected()
    {
        $pets = Pet::onlyTrashed()->with('images')->get();

        return response($pets);
    }
}
