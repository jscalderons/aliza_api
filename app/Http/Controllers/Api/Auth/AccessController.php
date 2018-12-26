<?php

namespace App\Http\Controllers\Api\Auth;

use \App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    // name
    // email
    // Inicia sesión en la api
    public function auth(Request $request) {

        $findUser = User::where('email', $request->email)->first();

        if (!$findUser) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->email);
            $user->image = $request->image ?? 'https://api.adorable.io/avatars/170/3';
            $user->api_token = str_random(60);
            $user->save();

            return response($user);
        }

        return response($findUser);
    }


}
