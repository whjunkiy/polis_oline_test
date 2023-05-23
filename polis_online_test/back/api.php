<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::post('signin', '\App\Http\Controllers\AuthController@login');
    Route::post('signup', '\App\Http\Controllers\AuthController@register');

    Route::get('all',  function  (Request $request)  {
        if (auth()->user()) {
            return response('Hello World', 200);
        } else {
            return response('Login Plz', 200);
        }
    });
});
