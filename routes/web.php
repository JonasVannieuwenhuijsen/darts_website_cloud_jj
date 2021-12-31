<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\homeController;
use  App\Http\Controllers\Controller;
use  App\Http\Controllers\PlayerInfoController;

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
    return redirect()->route('login');
});

Route::get('home', [homeController::class, 'test'])->name('home');



Auth::routes();
// Google
Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [App\Http\Controllers\GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [App\Http\Controllers\GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

// Facebook
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('login', [App\Http\Controllers\FaceBookController::class, 'loginWithFacebook'])->name('login');
    Route::any('callback', [App\Http\Controllers\FaceBookController::class, 'callbackFromFacebook'])->name('callback');
});

// Github
Route::prefix('github')->name('github.')->group( function(){
    Route::get('login', [App\Http\Controllers\GithubController::class, 'loginWithGithub'])->name('login');
    Route::any('callback', [App\Http\Controllers\GithubController::class, 'callbackFromGithub'])->name('callback');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('pdcRanking', [App\Http\Controllers\PdcRankingController::class, 'pdcRanking'])->name('pdcRanking');
Route::get('play', [App\Http\Controllers\PlayController::class, 'play'])->name("play");
Route::get('playerInfo', [App\Http\Controllers\PlayerInfoController::class, 'playerInfo'])->name("playerInfo");

// api for returning the checkout
Route::get('getCheckout/{score}', [App\Http\Controllers\PlayController::class, 'getCheckouts'])->name("getCheckout");
// api call for returning the ranking order of merit
Route::get('/ranking/get-data', [App\Http\Controllers\PdcRankingController::class, 'getRanking']);
// api for returning the 3 darts avg
Route::get('/getAvg/{prevAvg}/{amountDarts}/{thrownScore}', [App\Http\Controllers\PlayController::class, 'getAvg'])->name("getAvg");
// api to get user id
Route::get('/getPlayerId', [App\Http\Controllers\PlayController::class, 'getPlayerId'])->name("getPlayerId");

