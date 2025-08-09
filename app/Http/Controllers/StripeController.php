<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function checkout(){
        Stripe::setApiKey(config('stripe.sk'));

        $session = Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            "name" => "spotify subscription",
                            "description" => "to listent to our music please pay for that"
                        ],
                        'unit_amount'  => 1000,
                    ],
                    'quantity'   => 1,
                ],

            ],
            'mode'        => 'payment', // the mode  of payment
            'success_url' => route('dashboard'), // route when success 
            'cancel_url'  => route('stripe.payement'), // route when  failed or canceled
        ]);

        flash()->success("your payement successfully!");
        return redirect()->away($session->url);

    }
}
