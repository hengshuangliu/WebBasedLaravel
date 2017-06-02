<?php
/**
 * @Author: shuang
 * @Date:   2017-05-25 15:14:16
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-05-25 15:16:26
 */
namespace App\Repositories;

use App\Table;
use App\Restaurant;

class TableRepository
{
    /**
     * Get all of the Restaurant for a given user.
     *
     * @param  Restaurant  $restaurant
     * @return Collection
     */
    public function forRestaurant(Restaurant $restaurant)
    {
        return Table::where('restaurant_id', $restaurant -> id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}