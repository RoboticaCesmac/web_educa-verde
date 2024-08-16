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
    Route::apiResource('/setimo', 'App\Http\Controllers\SetimoController');
    Route::apiResource('/oitavo', 'App\Http\Controllers\OitavoController');
    Route::apiResource('/nono', 'App\Http\Controllers\NonoController');
    
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout');
});

Route::post('/login', 'App\Http\Controllers\AuthController@login');