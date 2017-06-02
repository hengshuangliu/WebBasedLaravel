<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use App\Restaurant;

class OrderController extends Controller
{
    //
    protected $orders;


    public function __construct(OrderRepository $orders)
    {
        $this->middleware('auth');

        $this->orders = $orders;

    }

    public function index(Request $request, Restaurant $restaurant)
    {
        $this->authorize('user_restaurant', $restaurant);
        // $orders = $this->orders->forRestaurant($restaurant);
        // dd($orders);
        return view('orders.index', [
            'orders' => $this->orders->forRestaurant($restaurant),
            'restaurant' => $restaurant,
        ]);
    }

    public function modify(Request $request, Order $order)
    {
        $restaurant = $order->table->restaurant;
        $this->authorize('user_restaurant', $restaurant);
        $order->status = "Finished";
        $order->save();

        return back();
    }

    public function destroy(Request $request, Order $order)
    {
        $this->authorize('destroy', $dish);
        $dish ->delete();

        // return redirect('/dishes/'.($restaurant->id));
        return back();
    }
}
