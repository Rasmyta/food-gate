<?php

use App\Http\Livewire\RestaurantComponent;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeliverymanController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RestaurantController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// CLIENT routes
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/main', [MainController::class, 'indexMain'])->name('main');
    Route::get('/restaurants', [MainController::class, 'indexRestaurants'])->name('restaurants');
    Route::get('/restaurant/{id}', [MainController::class, 'showRestaurant']);
    Route::get('/dishes/{id}', [MainController::class, 'indexDishes']);
    Route::get('/dish/{id}', [MainController::class, 'showDish']);
});

// INTRANET routes
Route::group(['middleware' => 'auth', 'prefix' => 'intranet'], function () {

    // Routes for ALL intranet members
    Route::group(['middleware' => 'intranetRoles'], function () {
        Route::view('/dashboard', 'intranet.dashboard')->name('intranet');
        Route::resource('orders', OrderController::class);
    });

    Route::group(['middleware' => 'role:admin'], function () {
        //Clients
        Route::get('clients/{client}/delete', [ClientController::class, 'destroy']);
        Route::resource('clients', ClientController::class);

        //Deliverymen
        Route::get('deliverymen/{deliveryman}/delete', [DeliverymanController::class, 'destroy']);
        Route::resource('deliverymen', DeliverymanController::class);
    });

    Route::group(['middleware' => 'role:deliveryman'], function () {
    });

    Route::group(['middleware' => 'role:rmanager'], function () {
        //Restaurants
        Route::get('restaurants/{restaurant}/delete', [RestaurantController::class, 'destroy']);
        Route::resource('restaurants', RestaurantController::class);

        //Dishes
        Route::get('dishes/{restaurant}', [DishController::class, 'index'])->name('dishes');
        Route::get('dishes/{dish}/delete', [DishController::class, 'destroy']);
        Route::resource('dishes', DishController::class);

        //Categories
        Route::get('categories/{category}/delete', [CategoryController::class, 'destroy']);
        Route::resource('categories', CategoryController::class);
    });
});
