<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Stripe\Stripe as Stripe;
use Stripe\Account as StripeAccount;
use Stripe\Charge as StripeCharge;
use Stripe\Token as StripeToken;
use Stripe\Coupon as StripeCoupon;

class StripeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // pk_test_qx6HZIL9k78PB0LbUMIxa28C

        Stripe::setApiKey("sk_test_cSuI6EMM4LBCweRvWLE52F9u");

        $stripeCoupon = StripeCoupon::create(array(
            "percent_off" => 25,
            "duration" => "repeating",
            "duration_in_months" => 3,
            "id" => "25OFF")
        );

        $stripeToken = StripeToken::create([
            "card" => [
                "number" => "4242424242424242",
                "exp_month" => 8,
                "exp_year" => 2016,
                "cvc" => "314"
            ]
        ]);

        /*StripeCharge::create([
            'amount' => 2000, // this is in cents: $20
            'currency' => 'usd',
            'card' => '25365488',
            'description' => 'Describe your product'
        ]);*/
     

    }
}
