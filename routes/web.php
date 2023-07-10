<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UrlShortenerController;

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
})->name('welcome');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/authenticate', [UserController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::controller(UrlShortenerController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    
        Route::get('/url-shortener/add', function () { return view('url.edit'); })->name('url-shortener.add');    
        Route::post('/url-shortener/create', 'store')->name('url-shortener.store');
        Route::get('/url-shortener/edit/{urlShortenerId}', 'edit')->name('url-shortener.edit');
    
        Route::get('/url-shortener/analytics/{urlShortenerId}', 'analytics')->name('url-shortener.analytics');
    });
});


Route::controller(UrlShortenerController::class)->group(function () {
    Route::get('/{userId}/{string}', 'redirect')->name('redirect');
});