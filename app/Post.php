<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $incrementing = false;

    protected $primaryKey = 'uid';

    protected $hidden = [
        'updated_at'
    ];

    protected $fillable = [
        'body',
        'title',
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'uid', 'user_uid');
    }

}
