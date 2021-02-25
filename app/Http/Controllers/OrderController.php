<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dish;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $prefix = 'intranet.orders.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('view', Order::class);
        $orders = Order::all();
        return view($this->prefix . 'index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->authorize('create', Order::class);

        $cart = json_decode($request->cart);
        $restaurant_id = '';

        foreach ($cart as $item) {
            $restaurant_id = Dish::findOrFail($item->id)->getRestaurant->id;
        }

        // if (User::getFreeDeliverymen()->first()) {
        //     $deliverer = User::getFreeDeliverymen()->first();
        //     $deliverer_id = $deliverer->id;
        //     $deliverer->state = 'ocupied';
        // }


        $order = new Order;
        $order->client_id = $request->client_id;
        $order->restaurant_id = $restaurant_id;
        $order->state = 'waiting';
        $order->save();

        //Saving the cart's items into pivot table 'dish_order'
        foreach ($cart as $item) {
            $order->getDishes()->attach($item->id, ['quantity' => $item->qty]);
        }

        //limpiar carrito
        Cart::destroy();

        return view('client.cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
