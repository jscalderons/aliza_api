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
