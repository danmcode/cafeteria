<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if( Auth::guest() != 1 ){
        return view('home');
    }
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('productos', 'App\Http\Controllers\ProductController')
    ->middleware('auth');

Route::post('/productos/{product}/{amountToSell}', [App\Http\Controllers\ProductController::class, 'sell'])
    ->name('vender')
    ->middleware('auth');
