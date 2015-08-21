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

class ChargeController extends Controller
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
        Stripe::setApiKey($this->stripeConfig['testSecretKey']);

        $stripeToken = $request->input('stripeToken');        
        $amount = $request->input('amount');        
        $currency = $request->input('currency');        
        $description = $request->input('description');      

        echo '<pre>';
        var_dump($request->all());
        echo '</pre>';  

        $charge = StripeCharge::create([
            "amount" => $amount,
            "currency" => $currency,
            "source" => $stripeToken,
            "description" => $description 
        ]);

        //return redirect('/account');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
        //
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
}
