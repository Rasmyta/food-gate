<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->role->name == "Administrator") {
            $restaurants = Restaurant::paginate(10);
        } else {
            $restaurants = Restaurant::where('user_id', '=', Auth::id())->get();
        }

        return view($this->prefix . 'index', ['restaurants' => $restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $restaurant->user_id = Auth::id();
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
        $this->authorize('show', $restaurant);
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
        $this->authorize('edit', $restaurant);
        return view($this->prefix . 'edit', ['restaurant' => $restaurant]);
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
        $this->authorize('update', $restaurant);
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
        $this->authorize('delete', $restaurant);
        $restaurant->delete();
        return redirect()->action([RestaurantController::class, 'index']);
    }
}
