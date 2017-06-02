<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    //
    protected $table = 'dishes';
    protected $fillable = ['name','description','price','picNum'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function ordersDishes()
    {
        return $this->hasMany(OrderDish::class);
    }

}
