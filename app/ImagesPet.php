<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagesPet extends Model
{
    protected $primaryKey = 'uid';

    protected $hidden = [
        'pet_uid',
        'created_at',
        'updated_at'
    ];
}
