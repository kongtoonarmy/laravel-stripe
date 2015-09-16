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
use Stripe\Customer as StripeCustomer;
use Stripe\Error as StripeError;

class ChargeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('charge.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        Stripe::setApiKey(\Config::get('stripe.key'));

        $stripeToken = $request->input('stripeToken');        
        $amount = $request->input('amount');        
        $currency = $request->input('currency');        
        $description = $request->input('description');      

        try {

            $charge = StripeCharge::create([
                "amount" => $amount,
                "currency" => $currency,
                "source" => $stripeToken,
                "description" => $description,
                "capture" => false

            ]);

            echo 'Charge has been added successfully.';

        } catch (StripeError\Base $err) {

            $errBody = $err->getJsonBody();

            echo 'Status is: ' . $err->getHttpStatus() . '<br>';
            echo 'Param is: ' . $errBody['error']['param'] . '<br>';
            echo 'Message is: ' . $errBody['error']['message'] . '<br>';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($code)
    {
        Stripe::setApiKey(\Config::get('stripe.key'));

        try {

            $stripeCharge = StripeCharge::retrieve($code);

            echo '<pre>';
            print_r($stripeCharge);
            echo '</pre>';

        } catch (StripeError\Base $e) {

            $errorBody = $e->getJsonBody();

            echo 'Status is: ' . $e->getHttpStatus() . '<br>';
            echo 'Param is: ' . $errorBody['error']['param'] . '<br>';
            echo 'Message is: ' . $errorBody['error']['message'] . '<br>';
        }  
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function capture($id)
    {
        Stripe::setApiKey(\Config::get('stripe.key'));

        try {

            $capture = StripeCharge::retrieve($id);
            $capture->capture();

        } catch (StripeError\Base $e) {

            $errorBody = $e->getJsonBody();

            echo 'Status is: ' . $e->getHttpStatus() . '<br>';
            echo 'Param is: ' . $errorBody['error']['param'] . '<br>';
            echo 'Message is: ' . $errorBody['error']['message'] . '<br>';
        }  

        
    }
}
