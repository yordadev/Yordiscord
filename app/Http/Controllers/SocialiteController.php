<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class SocialiteController extends Controller
{
    public function login()
    {
        return Socialite::driver('discord')->redirect();
    }

    public function callback()
    {
        
        $user = Socialite::driver('discord')->user();
        dd($user);
    }
}
