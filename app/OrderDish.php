<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDish extends Model
{
    protected $table = 'ordersDishes';
    protected $fillable = ['status','amount','dish_id','order_id'];

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
