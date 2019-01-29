<?php

namespace App\Http\Controllers\Api\Auth;

use \App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use \App\Http\Traits\RestControllerTrait;

class AccessController extends Controller
{
    use RestControllerTrait;

    public function auth(Request $request) {

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $user = User::create([
                'uid' => Str::uuid(),
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->email),
                'image' => $request->image ?? "https://api.adorable.io/avatars/170/" . str_random(2),
                'api_token' => str_random(60),
                'provider' => $request->provider ?? 'test'
            ]);
            dd($user);
        }

        return response($user->makeVisible('api_token'));
    }


}
