<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\RestaurantRepository;

class RestaurantController extends Controller
{
    //
    protected $restaurants;


    public function __construct(RestaurantRepository $restaurants)
    {
        $this->middleware('auth');

        $this->restaurants = $restaurants;

    }

    public function index(Request $request)
    {
        return view('restaurants.index', [
            'restaurants' => $this->restaurants->forUser($request->user()),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->restaurants()->create([
            'name' => $request->name,
            'address' => $request->address,
            'businessLicense' => $request->businessLicense,
        ]);
        // dd($request);
        return redirect('/restaurants');
    }

    public function destroy(Request $request, Restaurant $restaurant)
    {
        $this->authorize('destroy', $restaurant);

        $restaurant ->delete();

        return redirect('/restaurants');
    }


}
