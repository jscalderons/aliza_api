<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function sites()
    {
        return $this->hasMany('App\Site');
    }
}
