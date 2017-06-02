<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $fillable = ['remark','total','status'];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
    public function ordersDishes()
    {
        return $this->hasMany(OrderDish::class);
    }
}
