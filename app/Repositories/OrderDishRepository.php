<?php
/**
 * @Author: shuang
 * @Date:   2017-05-26 15:28:38
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-05-28 15:12:43
 */

namespace App\Repositories;

use App\OrderDish;
use App\Order;
use App\Dish;
use App\Restaurant;

class OrderDishRepository
{
    /**
     * Get all of the Restaurant for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forOrder(Order $Order)
    {
        return OrderDish::where('order_id', $Order -> id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
    public function forDish(Dish $dish)
    {
        return OrderDish::where('dish_id', $dish -> id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
    public function forRestaurant(Restaurant $restaurant)
    {
        return Dish::join('ordersDishes','dishes.id','=','ordersDishes.dish_id')
            ->where('dishes.restaurant_id',$restaurant -> id)
            ->get();
    }
}