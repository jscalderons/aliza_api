<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\RestControllerTrait;

class UserController extends Controller
{
    use RestControllerTrait;

    public function myFavorites() {
        $myFavorites = Auth::user()->favorites;

        return $this->successResponse($myFavorites);
    }

    public function myPets() {
        $myPets = Auth::user()->pets;

        return $this->successResponse($myPets);
    }

    public function mySites() {
        $mySites = Auth::user()->sites;

        return $this->successResponse($mySites);
    }

    public function myPosts()
    {
        $myPosts = Auth::user()->posts;

        return $this->successResponse($myPosts);
    }

    /**
     * Favorite a particular post
     *
     * @param  Post $post
     * @return Response
     */
    public function favoritePet(\App\Pet $pet)
    {
        Auth::user()->favorites()->attach($pet->uid);

        return $this->createdResponse();
    }

    /**
     * Unfavorite a particular post
     *
     * @param  Post $post
     * @return Response
     */
    public function unFavoritePet(\App\Pet $pet)
    {
        Auth::user()->favorites()->detach($pet->uid);

        return $this->deletedResponse();
    }
}
