<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;
use App\Restaurant;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\TableRepository;

class TableController extends Controller
{
    //
    protected $tables;


    public function __construct(TableRepository $tables)
    {
        $this->middleware('auth');

        $this->tables = $tables;

    }

    public function index(Request $request, Restaurant $restaurant)
    {
        $this->authorize('user_restaurant', $restaurant);
        return view('tables.index', [
            'tables' => $this->tables->forRestaurant($restaurant),
            'restaurant' => $restaurant,
        ]);
    }

    public function store(Request $request, Restaurant $restaurant)
    {
        $this->validate($request, [
            'alias_name' => 'required|max:45',
            'description' => 'required|max:64',
        ]);
        $this->authorize('user_restaurant', $restaurant);
        $restaurant->tables()->create([
            'alias' => $request->alias_name,
            'description' => $request->description,
        ]);

        return redirect('/tables/'.($restaurant->id));
    }

    public function destroy(Request $request, Table $table)
    {
        $this->authorize('destroy', $table);
        $table ->delete();
        return back();
    }

}
