<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDelivery extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'name', 'address_1', 'address_2', 'delivery_date'
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
}
