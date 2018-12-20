<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minisite extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
