<?php

use App\Http\Controllers\RestaurantController;
use App\Http\Resources\RestaurantResource;
use App\Http\Resources\DishResource;
use App\Models\Restaurant;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/restaurant/{id}', function ($id) {
    return new RestaurantResource(Restaurant::findOrFail($id));
});

Route::middleware('auth:sanctum')->get('/restaurant', function () {
    return RestaurantResource::collection(Restaurant::paginate(3));
});

Route::middleware('auth:sanctum')->get('/dishes', function () {
    return DishResource::collection(Dish::paginate(3));
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/restaurant', [RestaurantController::class, 'apiStore']);
    Route::delete('/restaurant/{restaurant}', [RestaurantController::class, 'apiDelete']);
});
