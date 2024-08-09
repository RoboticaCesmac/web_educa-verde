<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group([
    'middleware' => 'auth:api',
], function($router) {
    Route::apiResource('/sexto', 'App\Http\Controllers\SextoController');
    
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout');
});

Route::post('/login', 'App\Http\Controllers\AuthController@login');