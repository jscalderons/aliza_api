<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $incrementing = false;

    protected $primaryKey = 'uid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
        'password',
        'remember_token',
    ];



    public function favorites() {
        return $this->belongsToMany('App\Pet', 'favorites', 'user_uid', 'pet_uid')->withTimeStamps();
    }

    public function pets() {
        return $this->hasMany('App\Pet');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function sites()
    {
        return $this->hasMany('App\Minisite');
    }
}
