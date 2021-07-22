<?php

use Illuminate\Support\Facades\Route;

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
if (App::environment('production')) {
    URL::forceScheme('https');
}

Route::get('/smallUrl', function () {
    return view('ShortUrl.shorturl');
});
Route::get('/topUrl', function () {
    return view('ShortUrl.topurl');
});

Route::post('/smallUrl', 'App\Http\Controllers\ShortUrlController@store');

Route::get('/smallUrl/{smallUrl}', 'App\Http\Controllers\ShortUrlController@linkRedirect');

Route::get('/{smallUrl}', 'App\Http\Controllers\ShortUrlController@linkReturn');