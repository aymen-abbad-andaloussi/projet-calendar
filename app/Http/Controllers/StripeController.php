<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function checkout(){
    $event = Calendar::where('user_id', Auth::id())->latest()->first();
        // dd(Auth::user()->name);
        
        Stripe::setApiKey(config('stripe.sk'));
        
        $session = Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'mad',
                        'product_data' => [
                            "name" => "Reservation subscription",
                            "description" => "Hello Mr " . Auth::user()->name . " to reserve our events please pay for that ! " .
                                         " Your Start event: " . $event->start .
                                         " & Your End Event: " . $event->end,
                        ],
                        'unit_amount'  => 25000,
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
