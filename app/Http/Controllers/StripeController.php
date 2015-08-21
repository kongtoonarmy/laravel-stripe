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

    private $stripeConfig;
    public function __construct()
    {   
        $this->stripeConfig = \Config::get('stripe');
    }



    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function temp()
    {
        // pk_test_qx6HZIL9k78PB0LbUMIxa28C

        

        /*$stripeCoupon = StripeCoupon::create([
            "percent_off" => 25,
            "duration" => "repeating",
            "duration_in_months" => 3,
            "id" => "25OFF"]
        );*/

       /* $stripeToken = StripeToken::create([
            "card" => [
                "number" => "4242424242424242",
                "exp_month" => 8,
                "exp_year" => 2016,
                "cvc" => "314"
            ]
        ]);

        echo '<pre>';
        print_r($stripeToken);
        echo '</pre>';*/

        

    }

    public function index(Request $request)
    {
        $token = $request->input('stripeToken');
        echo 'token = '.$token;
    }

    public function createCharge()
    {
        Stripe::setApiKey($this->stripeConfig['testSecretKey']);

        $stripeCharge = StripeCharge::create([
            'amount' => 2000, // this is in cents: $20
            'currency' => 'usd',
            'card' => 'tok_16ZzIaH7PksWTbQLK6AvzuVR',
            'description' => 'Describe your product'
        ]);
     
        echo '<pre>';
        print_r($stripeCharge);
        echo '</pre>';
    }
}
