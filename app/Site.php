<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public $incrementing = false;

    protected $table = 'minisites';

    protected $primaryKey = 'uid';

    protected $hidden = [
        'updated_at'
    ];

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'description',
        'phone',
        'location',
        'address',
        'latitude',
        'longitude',
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'uid', 'user_uid');
    }

    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

}
