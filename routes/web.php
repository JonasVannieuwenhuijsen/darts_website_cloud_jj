<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\homeController;
use  App\Http\Controllers\Controller;

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



Route::get('home', [homeController::class, 'test']);
Route::get('testapi', [Controller::class, 'testApi'])->name('testApi');
Route::get('checkout/{score}', [Controller::class, 'calcCheckout'])->name('checkout');
