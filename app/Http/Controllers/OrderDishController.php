<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Restaurant;
use App\OrderDish;
use App\Order;
use App\Repositories\OrderDishRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderDishController extends Controller
{
    protected $ordersDishes;


    public function __construct(OrderDishRepository $ordersDishes)
    {
        $this->middleware('auth');

        $this->ordersDishes = $ordersDishes;

    }

    public function index(Request $request, Restaurant $restaurant)
    {
        $this->authorize('user_restaurant', $restaurant);
        $ordersDishesTemp = $this->ordersDishes->forRestaurant($restaurant);
        $ordersDishesTemp = $ordersDishesTemp->filter(function($orderDish){return Order::find($orderDish->order_id)->status !== "NotConfirm";});
        $tablesTemp = $ordersDishesTemp->map(function($orderDish){return Order::find($orderDish->order_id)->table;});
        // dd($ordersDishesTemp);
        return view('ordersDishes.index', [
            'ordersDishesTemp' => $ordersDishesTemp,
            'tablesTemp' => $tablesTemp,
            'restaurant' => $restaurant,
        ]);
    }

    public function modify(Request $request, OrderDish $orderDish)
    {
        $restaurant = $orderDish->dish->restaurant;
        $this->authorize('user_restaurant', $restaurant);
        $orderDish->status = ($orderDish->status === "NotStart")?"Making":"Finished";
        $orderDish->save();

        return back();
    }
}
