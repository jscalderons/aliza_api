<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\RestControllerTrait;

class UserController extends Controller
{
    use RestControllerTrait;

    public function myFavorites() {
        $myFavorites = auth()->user()->favorites;

        return $this->successResponse($myFavorites);
    }

    public function myPets() {
        $myPets = auth()->user()->pets;

        return $this->successResponse($myPets);
    }

    public function mySites() {
        $mySites = auth()->user()->sites;

        return $this->successResponse($mySites);
    }

    public function myPosts()
    {
        $myPosts = auth()->user()->posts;

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
        auth()->user()->favorites()->attach($pet->uid);

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
        auth()->user()->favorites()->detach($pet->uid);

        return $this->deletedResponse();
    }
}
