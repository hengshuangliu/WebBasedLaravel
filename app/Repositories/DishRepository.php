<?php

namespace App\Repositories;

use App\Dish;
use App\Restaurant;

class DishRepository
{
    /**
     * Get all of the Restaurant for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forRestaurant(Restaurant $restaurant)
    {
        return Dish::where('restaurant_id', $restaurant -> id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}