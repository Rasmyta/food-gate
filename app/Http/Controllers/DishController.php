<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    private $prefix = 'intranet.dishes.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurant $restaurant)
    {
        $dishes = Dish::where('restaurant_id', '=', $restaurant->id)->get();
        return view($this->prefix . 'index', ['dishes' => $dishes,])->with('restaurant', $restaurant);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Dish::class);
        return view($this->prefix . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Dish::class);
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
        ]);

        $dish = new Dish;
        $dish->category_id = $request->category;
        $dish->restaurant_id = $request->restaurant_id;
        $dish->name = $request->name;
        $dish->description = $request->description;
        $dish->price = $request->price;
        $dish->save();

        // If the photo is valid, it will be saved in storage/app/public/images/dishes
        if ($request->file('photo_path')->isValid()) {
            $name = 'dish_' . $dish->restaurant_id . '_' . $dish->category_id . '_' . $dish->id;
            $path = $request->photo_path->storeAs('public/images/dishes', $name . '.' . $request->photo_path->extension());
            $dish->photo_path = str_replace('public', 'storage', $path); //url to public folder - storage/images/dishes/photoname
            $dish->save();
        }

        return redirect()->action([DishController::class, 'index', $request->restaurant_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view($this->prefix . 'show', ['dish' => $dish]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        //
    }
}
