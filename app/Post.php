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


}
