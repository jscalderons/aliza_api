<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    // Inicia sesión en la api
    public function logIn(Request $request) {
        return response($request->all());
    }
}
