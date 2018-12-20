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
        return $this->hasOne('App\ImagesPet', 'pet_uid', 'uid');
    }
}
