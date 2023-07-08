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
    return view('welcome');
});

Route::controller(UrlShortenerController::class)->group(function () {
    Route::get('/dashboard', 'dashboard');
    Route::get('/url-shortener/create', 'url-shortener.store');
    Route::get('/url-shortener/edit/{urlShortenerId}', 'url-shortener.edit');
    Route::get('/url-shortener/analytics/{urlShortenerId}', 'url-shortener.analitics');
})->middleware('auth');

Route::controller(UrlShortenerController::class)->group(function () {
    Route::get('/{userId}/{string}', 'redirect');
});