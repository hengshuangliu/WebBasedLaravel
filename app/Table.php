<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    //
    protected $table = 'tables';
    protected $fillable = ['alias','description'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
