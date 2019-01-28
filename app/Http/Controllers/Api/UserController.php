<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\RestControllerTrait;

class UserController extends Controller
{
    use RestControllerTrait;

    public function myFavorites()
    {
        $myFavorites = auth()->user()->favorites()->paginate(env('PAGINATE', 6));

        return response($myFavorites);
    }

    public function myPets()
    {
        $myPets = auth()->user()->pets()->paginate(env('PAGINATE', 6));

        return response($myPets);
    }

    public function mySites() {
        $mySites = auth()->user()->sites()->paginate(env('PAGINATE', 6));

        return response($mySites);
    }

    public function myPosts()
    {
        $myPosts = auth()->user()->posts()->paginate(env('PAGINATE', 6));

        return response($myPosts);
    }

    public function myPromotions()
    {
        $myPromotions = auth()->user()->promotions()->paginate(env('PAGINATE', 6));

        return response($myPromotions);
    }

    public function myCoupons()
    {
        $myCoupons = auth()->user()->coupons()
                        ->whereNull('validated_at')
                        ->paginate(env('PAGINATE', 6));

        return response($myCoupons);
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
