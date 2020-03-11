<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Logout extends Controller
{
    public function process()
    {
        Auth::logout();
        return redirect()->to('/');
    }
}
