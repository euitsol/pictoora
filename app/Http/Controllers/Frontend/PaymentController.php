<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\FontendBaseController;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends FontendBaseController
{
    public function stripeInit(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'Sample Product',
                    ],
                    'unit_amount' => 100 * 100, // $100
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('success.index'),
            'cancel_url' => route('failed.index'),
        ]);

        return redirect($session->url);
    }
}
