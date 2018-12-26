<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minisite extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function category() {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
}
