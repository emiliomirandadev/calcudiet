<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ProductsController;

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
})->name('hello');

Route::get('/hello', function () {
    return view('hello');
})->name('home');


Route::group(['middleware'=>'auth'], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('products',App\Http\Controllers\ProductsController::class);
});

require __DIR__.'/auth.php';

Route::resource('products',App\Http\Controllers\ProductsController::class)
->except(['create','edit','store','update','destroy']);