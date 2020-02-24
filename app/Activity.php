<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'activity_name',
        'activity_finish',
        'activity_delivery_estimated',
        'activity_cost','customer_id',
        'created_at',
        'updated_at'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }

    public function getActivityCostAttribute($value)
    {
        $value = number_format($value, '2', ',', '.');
        return 'R$ ' . $value;
    }

}
