<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = \App\Pet::whereNull('approved_at')->get();

        return view('admin.home', compact('pets'));
    }
}
