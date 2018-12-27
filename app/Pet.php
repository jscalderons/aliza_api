<?php

namespace App;

use \App\Favorite;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    public $incrementing = false;

    protected $primaryKey = 'uid';

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'process_id',
        'name',
        'phone',
        'months',
        'sterilized',
        'vaccinated',
        'sex',
        'description',
        'city',
        'longitude',
        'latitude',
    ];

    protected $with = [
        'images'
    ];

    protected $appends = [
        'isFavorite'
    ];

    public function images() {
        return $this->hasMany('App\ImagesPet', 'pet_uid', 'uid');
    }

    public function user() {
        return $this->hasOne('App\User', 'uid', 'user_uid');
    }

    /**
     * Determine whether a post has been marked as favorite by a user.
     *
     * @return boolean
     */
    public function getisFavoriteAttribute()
    {
        if (auth()->check()) {
            return (bool) Favorite::where('user_uid', auth()->user()->uid)
                                ->where('pet_uid', $this->uid)
                                ->first();
        }

        return false;
    }
}
