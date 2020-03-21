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

Route::get('/', 'Features\ServerListing@landingPage')->name('landing');


/*
 *
 * Discord OAuth2 Authentication 
 * 
 */
Route::get('oauth/discord', 'Auth\DiscordAuthentication@redirectUser')->name('discord.login');

//Route::get('oauth/discord/callback', 'Auth\DiscordAuthentication@callback');

/*
 *
 * Authentication Required Beyond This Point
 * 
 */

Route::middleware(['auth:web'])->group(function () {
    /*
     *
     * Authenticated Dashboard
     * 
     */
    Route::get('profile', 'Account\Profile@index')->name('home');
    Route::post('/s/recommend', 'Account\RecommendServer@process')->name('recommend.server');
    
    /*
     *
     * Auth Routes
     * 
     */
    Route::get('logout', 'Auth\Logout@process')->name('logout');


    /*
     *
     * Feature Routes
     * 
     */

    Route::post('/s/list', 'Features\ServerListing@listServer')->name('list.server');

    Route::prefix('v1/', function () {
        Route::prefix('who/', function () {
            Route::get('{guild_id}', 'Features\Whois@guild')->name('feature.whois.guild');
            Route::prefix('who/{guild_id}/u/', function () {
                Route::get('{discord_id}', 'Features\Whois@user')->name('feature.whois.user');
            });
        });
    });
});
