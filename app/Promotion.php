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

    public function site()
    {
        return $this->hasOne('App\Minisite', 'uid', 'site_uid');
    }

    public function coupons() {
        return $this->belongsToMany('App\User', 'coupons', 'promotion_uid', 'user_uid')->withTimeStamps();
    }

    public function scopeAvailable($query, $user)
    {
        return $query->select('promotions.*')
                    ->leftJoin('coupons', function($join) use ($user) {
                        $join->on('coupons.promotion_uid', 'promotions.uid')
                            ->where('coupons.user_uid', $user->uid);
                    })
                    ->where('promotions.max_date_valid', '>=', date('Y-m-d'))
                    ->whereNull('coupons.id');
    }

}
