<?php

namespace App;

use \App\Favorite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    protected $primaryKey = 'uid';

    protected $dates = [ 'deleted_at' ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    protected $fillable = [
        'process_id',
        'name',
        'phone',
        'age',
        'sterilized',
        'vaccinated',
        'gender',
        'description',
        'location',
        'longitude',
        'latitude',
    ];

    protected $with = ['images'];

    protected $appends = ['isFavorite'];

    public function images() {
        return $this->hasMany('App\ImagesPet', 'pet_uid', 'uid');
    }

    public function user() {
        return $this->hasOne('App\User', 'uid', 'user_uid');
    }

    public function getIsFavoriteAttribute()
    {
        if (auth()->check()) {
            return (bool) Favorite::where('user_uid', auth()->user()->uid)
                                ->where('pet_uid', $this->uid)
                                ->first();
        }

        return false;
    }

    public function scopeApproved($query)
    {
        return $query->whereNotNull('approved_at');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', "%{$search}%")
                ->orWhere('location', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
    }

    public function scopeSortByCoordinates($query, $latitude, $longitude)
    {
        $sorfQuery = "(((acos(sin(({$latitude} * pi() / 180))
                        * sin((Latitude * pi() / 180))
                        + cos(({$latitude} * pi() / 180))
                        * cos((Latitude * pi() / 180))
                        * cos((({$longitude} - Longitude) * pi() / 180)))) * 180 / pi())
                        * 60 * 1.1515 * 1.609344)";

        return $query->select()
                    ->selectRaw("{$sorfQuery} AS distance");
    }
}
