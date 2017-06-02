<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    //
     protected $table = 'restaurants';
     // 能被批量赋值；
     protected $fillable = ['name'];

     /**
     * 获取拥有此餐馆的用户。一对多
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    public function tables()
    {
        return $this->hasMany(Table::class);
    }


}
