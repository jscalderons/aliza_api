<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Code extends Model
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

    protected $dates = [ 'deleted_at' ];

    public function scopeAvailable($query)
    {
        return $query->where('max_date_valid', '>=', date('Y-m-d'));
    }
}
