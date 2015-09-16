<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Stripe\Stripe as Stripe;
use Stripe\Token as StripeToken;
use Stripe\Error as StripeError;
use Stripe\Account as StripeAccount;
use Stripe\Card as StripeCard;


class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        Stripe::setApiKey(\Config::get('stripe.key'));

        return view('card.index');    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        Stripe::setApiKey(\Config::get('stripe.key'));    


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

        $accountId = $request->input('accountId');        

        try {

            $stripeAccount = StripeAccount::retrieve($accountId);    

            $stripeToken = self::getStripeToken();

            $stripeAccount->external_accounts->create([
                "external_account" => $stripeToken
            ]);            

        } catch (StripeError\Base $e) {

            return $e->getMessage();
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        
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

    public function getStripeToken()
    {
        Stripe::setApiKey(\Config::get('stripe.key'));

        try {

            $stripeToken = StripeToken::create([
                "card" => [
                    "number" => "5200828282828210",
                    "exp_month" => 8,
                    "exp_year" => 2018,
                    "cvc" => "314",
                    "currency" => "usd"
                ]
            ]);

            return $stripeToken->id;

        } catch (StripeError\Base $e) {

            return $this->sendBackJsonError($e->getHttpStatus());
        }
    }
}
