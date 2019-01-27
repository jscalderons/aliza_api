<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    protected $primaryKey = 'uid';

    protected $fillable = [
        'site_uid',
        'description',
        'quantity',
        'max_date_valid'
    ];

    // TODO: Revisar que campos puedes esconder
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = [ 'deleted_at' ];

    public function scopeAvailable($query)
    {
        return $query->where('max_date_valid', '>=', date('Y-m-d'));
    }

    public function coupons() {
        return $this->belongsToMany('App\User', 'coupons', 'promotion_uid', 'user_uid')->withTimeStamps();
    }


}
