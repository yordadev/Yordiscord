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

Route::get('{guild_id}', 'Features\Whois@guild')->name('feature.whois.guild');

Route::prefix('v1/', function(){
    Route::prefix('who/g/', function(){


        Route::prefix('who/g/{guild_id}/u/', function(){
            Route::get('{discord_id}', 'Features\Whois@user')->name('feature.whois.user');
        });

    });

    
});

