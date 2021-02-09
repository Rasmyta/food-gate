<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    private $prefix = 'intranet.restaurants.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::orderBy('name')->paginate(10);
        // $restaurants = Restaurant::all();
        return view($this->prefix . 'index', ['restaurants' => $restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->prefix . 'create')->with('title', 'New restaurant');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required|email:rfc,filter',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $restaurant = new Restaurant;

        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->city = $request->city;
        $restaurant->phone = $request->phone;
        $restaurant->email = $request->email;
        $restaurant->latitude = $request->latitude;
        $restaurant->longitude = $request->longitude;
        $restaurant->save();

        return redirect()->action([RestaurantController::class, 'show'], $restaurant);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view($this->prefix . 'show', ['restaurant' => $restaurant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view($this->prefix . 'edit')
            ->with('title', 'Edit restaurant')
            ->with('restaurant', $restaurant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required|email:rfc,filter',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->city = $request->city;
        $restaurant->phone = $request->phone;
        $restaurant->email = $request->email;
        $restaurant->latitude = $request->latitude;
        $restaurant->longitude = $request->longitude;
        $restaurant->save();

        return redirect()->action([RestaurantController::class, 'show'], $restaurant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->action([RestaurantController::class, 'index']);
    }
}
