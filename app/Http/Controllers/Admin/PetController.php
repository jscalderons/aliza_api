<?php

namespace App\Http\Controllers\Admin;

use \App\Pet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetController extends Controller
{
    public function approve($uid)
    {
        $pet = Pet::find($uid);

        $pet->approved_at = now();

        $pet->update();

        return back();
    }
}
