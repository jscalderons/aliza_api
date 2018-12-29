<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minisite extends Model
{
    public $incrementing = false;

    protected $primaryKey = 'uid';

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'phone',
        'location',
        'address',
        'latitude',
        'longitude',
    ];

    protected $with = [
        'category'
    ];

    public function category() {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function user() {
        return $this->hasOne('App\User', 'uid', 'user_uid');
    }
}
