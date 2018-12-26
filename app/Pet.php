<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    public $incrementing = false;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function images()
    {
        return $this->hasMany('App\ImagesPet', 'pet_uid', 'uid');
    }

    public function user() {
        return $this->hasOne('App\User', 'uid', 'user_uid');
    }
}
