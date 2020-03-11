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

Route::get('/', function () {
    return view('welcome');
})->name('landing');


Route::get('oauth/discord', 'Auth\DiscordAuthentication@redirectUser')->name('discord.login');
Route::get('oauth/discord/callback', 'Auth\DiscordAuthentication@callback');

Route::middleware(['auth:web'])->group(function () {
    Route::get('dashboard', function () {
        return redirect()->route('landing');
    })->name('home');

    Route::get('logout', 'Auth\Logout@process')->name('logout');
});

