<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function add($id)
    {
        $restaurantCart = null;

        $dish = Dish::findorfail($id);

        //Sacamos el restaurante de los platos del carro
        //para solo permitir platos de ese restaurante
        foreach (Cart::content() as $item) {
            $dishCart = Dish::find($item->id);
            $restaurantCart = $dishCart->getRestaurant;
        }

        //Comprobamos que coinciden los restaurantes de lo que hay en el carro
        if (!empty($restaurantCart)) {
            if ($dish->getRestaurant->id != $restaurantCart->id) {
                return redirect()->back()->withErrors(['Cannot add dishes from different restaurants.']);
            }
        }

        //Añadimos plato al carro
        Cart::add(
            $dish->id,
            $dish->name,
            1,
            $dish->price
        );


        return redirect()->back()->withErrors(['Added successfully.']);
    }


    public function check()
    {
        return view('client.cart');
    }

    public function delete(Request $request)
    {
        $item = Cart::content()->where('id', $request->id)->first();
        Cart::remove($item->rowId);
        return redirect()->back();
    }
}
