<?php
/**
 * @Author: Marte
 * @Date:   2017-05-27 14:59:19
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-05-28 14:39:16
 */
namespace App\Repositories;

use App\Order;
use App\Restaurant;
use App\Table;

class OrderRepository
{
    /**
     * Get all of the Restaurant for a given user.
     *
     * @param  Restaurant  $restaurant
     * @return Collection
     */
    public function forRestaurant(Restaurant $restaurant)
    {
        // return Order::join('tables', function($join){
        //             $join->on('orders.table_id','=','tables.id')->where('tables.restaurant_id',$restaurant -> id);})
        //         ->orderBy('created_at', 'desc')
        //         ->get();
        return Table::join('orders','tables.id','=','orders.table_id')->where('tables.restaurant_id',$restaurant -> id)->get();
    }
    public function forTable(Table $table)
    {
        return Order::where('table_id', $table -> id)
                    ->orderBy('created_at', 'desc')
                    ->get();
    }
}