<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Table;
use App\Restaurant;
use App\Order;
use App\OrderDish;
use App\Dish;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\DishRepository;
use App\Repositories\OrderDishRepository;

class NewGuestController extends Controller
{
    //
    protected $ordersDishes;
    protected $dishes;


    public function __construct(DishRepository $dishes, OrderDishRepository $ordersDishes)
    {
        $this->dishes = $dishes;
        $this->ordersDishes = $ordersDishes;

    }

    public function index(Request $request, Restaurant $restaurant, Table $table)
    {
        if ($restaurant->id === $table->restaurant_id)
        {
            $order = $table->orders()->orderBy('created_at', 'desc')->first();
            $order_status = (empty($order)) ? "Finished":($order->status);
            if ($order_status === "Finished")
            {
                $order = $table-> orders()->create(['status' => "NotConfirm",'total'=> 0.0,]);
            }
            $orderDishesTemp = $this->ordersDishes->forOrder($order);
            $dishes = $orderDishesTemp-> map(function($orderDish){return $orderDish->dish;});
            $dishesRestaurant = $this->dishes->forRestaurant($restaurant);
            return view('guest.indexnew', [
                    'ordersDishes' => $orderDishesTemp,
                    'restaurant' => $restaurant,
                    'table' => $table,
                    'order' => $order,
                    'dishes' => $dishes,
                    'dishesRestaurant' => $dishesRestaurant,
                    ]);
        }
        else
        {
            abort(403, 'Illegal Action.');
        }
    }

    public function create(Request $request, Dish $dish, Order $order)
    {
        if($order->status == "NotConfirm")
        {
            $orderDish = OrderDish::where('order_id', $order->id)->where('dish_id', $dish->id)->first();
            if(empty($orderDish))
            {
                $orderDish = $order -> ordersDishes()->create([
                "dish_id" => $dish ->id,
                "status" => "NotStart",
                "amount" => 1,
                ]);
            }
            else
            {
                $orderDish->amount += 1;
                $orderDish->save();
            }
            $this->updateTotal($order);
            $info = ["name"=>$dish->name, "price"=>$dish->price, "amount"=>$orderDish->amount, "total"=>$order->total,"orderDish"=>$orderDish->id,];
            return $info;
        }
        else
        {
            abort(403, 'Illegal Action.');
        }
    }


    public function destroy(Request $request, OrderDish $orderDish)
    {
        $orderDishId = $orderDish->id;
        $order = $orderDish->order;
        if(($orderDish->order->status !== "Finished") and ($orderDish->status === "NotStart"))
        {
            if($orderDish->amount > 1){
                $orderDish->amount -= 1;
                $orderDish->save();
                $amount = $orderDish->amount;

            }
            else{
                $orderDish->delete();
                $amount = 0;
            }
        }
        else
        {
           return back();
        }
        $this->updateTotal($orderDish->order);
        $info = ["total"=>$order->total, "orderDish"=>$orderDishId, "amount"=>$amount, ];
        return $info;
    }

    public function confirm(Request $request, Order $order)
    {
        if($order->status === "NotConfirm")
        {
            $order->status = "Enjoying";
            $order->remark = $request->remark;
            $order->save();
        }
        else
        {
           abort(403, 'Illegal Action.');
        }
        // return redirect('/dishes/'.($restaurant->id));
        return back();
    }

    public function updateTotal(Order $order)
    {
        $orderDishesTemp = $this->ordersDishes->forOrder($order);
        $dishesPrice = $orderDishesTemp-> map(function($orderDish){
            return ($orderDish->dish->price)*($orderDish->amount);});
        $order->total = array_sum($dishesPrice->all());
        $order->save();
    }
}
