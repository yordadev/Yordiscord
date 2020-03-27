<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class Billing extends Controller{
    public function index(){
        $data = [];

        $data['plans'] = [];
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $plans = \Stripe\Plan::all();
        foreach($plans as $plan){
            
            array_push($data['plans'], [
                'id' => $plan->id,
                'amount' => $plan->amount,
                'amount_decimal' => $plan->amount_decimal,
                'nickname' => $plan->nickname
            ]);
            
        }

     
        return view('billing.index', ['data' => $data]);
    }

    public function upgradeAccount(Request $request){

    }
}