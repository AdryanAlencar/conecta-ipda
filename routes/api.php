<?php

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

/**
 * Routes for the State resource:
 *  GET  /states -> return all the states
 *  GET  /states/{id} -> return the state with the given id
 *  GET  /states/{id}/cities -> return all the cities of the state with the given id
 *  GET  /cities/{id}/addresses -> return all the addresses of the city with the given id
 *  GET  /cities/{id}/districts -> return all the districts of the city with the given id
 */

Route::get('/states', function () {
    return App\Models\State::all();
});

Route::get('/states/{id}', function ($id) {
    return App\Models\State::find($id);
});

Route::get('/states/{id}/cities', function ($id) {
    return App\Models\State::find($id)->cities;
});

Route::get('/cities/{id}/addresses', function ($id) {
    return App\Models\City::find($id)->addresses;
});

Route::get('/cities/{id}/districts', function ($id) {
    return App\Models\City::find($id)->districts || [];
});
