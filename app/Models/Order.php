<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const STATUS = ['INCOMPLETE' => 0, 'PENDING' => 1, 'APPROVED' => 2, 'DECLINED' => 3];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'site_id', 'user_id', 'order_ref', 'status', 'multiple'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function site()
    {
        return $this->belongsTo('App\Models\Site');
    }

    public function order_delivery()
    {
        return $this->hasOne('App\Models\OrderDelivery', 'order_id');
    }

    public function order_items()
    {
        return $this->hasMany('App\Models\OrderItem', 'order_id');
    }

    public function order_comments()
    {
        return $this->hasMany('App\Models\OrderComment', 'order_id');
    }
}
