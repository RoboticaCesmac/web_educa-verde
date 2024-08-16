<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sexto', function () {
    return view('app.sexto');
})->name('sexto')->middleware('auth');

Route::get('/setimo', function () {
    return view('app.setimo');
})->name('setimo')->middleware('auth');

Route::get('/oitavo', function () {
    return view('app.oitavo');
})->name('oitavo')->middleware('auth');

Route::get('/nono', function () {
    return view('app.nono');
})->name('nono')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
