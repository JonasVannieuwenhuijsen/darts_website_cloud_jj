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



Route::get('home', [homeController::class, 'test'])->name('home');
Route::get('pdcRanking', [Controller::class, 'pdcRanking'])->name('pdcRanking');
Route::get('play/{score}', [Controller::class, 'play'])->name("play");


Route::get('/ranking/get-data', [Controller::class, 'getRanking']);