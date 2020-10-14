<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    const METRIC_TYPE = ['LITRES' => 1, 'KG' => 2, 'METERS' => 3, 'PIECES' => 4, 'UNITS' => 5, 'CUBES' => 6, 'SQM' => 7];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'item_id', 'quantity', 'metric_type'
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function item()
    {
        return $this->belongsTo('App\Models\Item');
    }
}
