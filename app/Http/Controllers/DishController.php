<?php

namespace App\Http\Controllers;

use Gate;

use Illuminate\Http\Request;
use App\Dish;
use App\Restaurant;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\DishRepository;

class DishController extends Controller
{
    //
    protected $dishes;
    protected $destinationPath;

    public function __construct(DishRepository $dishes)
    {
        $this->middleware('auth');

        $this->dishes = $dishes;
        $this->destinationPath = public_path()."/uploads";

    }

    public function index(Request $request, Restaurant $restaurant)
    {
        // dd($this->destinationPath);
        $this->authorize('user_restaurant', $restaurant);
        return view('dishes.index', [
            'dishes' => $this->dishes->forRestaurant($restaurant),
            'restaurant' => $restaurant,
        ]);
    }

    public function store(Request $request, Restaurant $restaurant)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|max:255',
            // 'picNum' => 'required|max:255',
        ]);
        if($request->hasFile('file'))
        {
            if ($request->file('file')->isValid()) {
                $this->authorize('user_restaurant', $restaurant);
                $dish = $restaurant->dishes()->create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'price' => $request->price,
                    // 'picNum' => $request->picNum,
                    ]);
                $picName = $dish->id.".jpg";
                $request->file('file')->move($this->destinationPath, $picName);
                // $dish -> picNum = $dish->id;
                // $dish->save();
            }
            else
            {
                abort(403, 'Upload file Error.');
            }
        }
        else
        {
            abort(403, 'No Upload file.');
        }



        return redirect('/dishes/'.($restaurant->id));
    }

    public function destroy(Request $request, Dish $dish)
    {
        $this->authorize('destroy', $dish);
        $dish ->delete();

        // return redirect('/dishes/'.($restaurant->id));
        return back();
    }

    public function modify(Request $request, Dish $dish)
    {
        $this->authorize('destroy', $dish);
        if($request->hasFile('file'))
        {
            if ($request->file('file')->isValid()) {
                $picName = $dish->id.".jpg";
                $request->file('file')->move($this->destinationPath, $picName);
            }
            else
            {
                abort(403, 'Upload file Error.');
            }
        }
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|max:255',
            // 'picNum' => 'required|max:255',
        ]);
        $dish -> name = $request->name;
        $dish -> description = $request->description;
        $dish -> price = $request->price;
        $dish->save();


        // return redirect('/dishes/'.($restaurant->id));
        return redirect('/dishes/'.($dish->restaurant->id));
    }

    public function modifyIndex(Request $request, Dish $dish)
    {
        $this->authorize('destroy', $dish);
        return view('dishes.modifyIndex', [
            'dish' => $dish,
        ]);
    }

}
