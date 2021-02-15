<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeliverymanController;
use App\Http\Controllers\DishController;
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
    Route::view('/main', 'client.main')->name('main');
});

// INTRANET routes
Route::group(['middleware' => 'auth', 'prefix' => 'intranet'], function () {

    // Routes for ALL intranet members
    Route::group(['middleware' => 'intranetRoles'], function () {
        Route::view('/dashboard', 'intranet.dashboard')->name('intranet');
        Route::resource('orders', OrderController::class);
    });

    Route::group(['middleware' => 'role:admin'], function () {
        Route::resource('clients', ClientController::class);
        Route::resource('deliverymen', DeliverymanController::class);
    });

    Route::group(['middleware' => 'role:deliveryman'], function () {
    });

    Route::group(['middleware' => 'role:rmanager'], function () {
        Route::get('restaurants/{restaurant}/delete', [RestaurantController::class, 'destroy']);
        Route::get('dishes/{restaurant}', [DishController::class, 'index']);
        Route::resource('restaurants', RestaurantController::class);
        Route::resource('dishes', DishController::class);
        Route::resource('categories', CategoryController::class);
    });
});
