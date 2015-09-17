<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Response;

use Stripe\Stripe as Stripe;
use Stripe\Account as StripeAccount;
use Stripe\Card as StripeCard;
use Stripe\Charge as StripeCharge;
use Stripe\Token as StripeToken;
use Stripe\Customer as StripeCustomer;
use Stripe\Error as StripeError;

class AccountCardController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store($accoutId)
    {
        Stripe::setApiKey(\Config::get('stripe.key'));

        try {

            $stripeToken = self::getStripeToken();

            $stripeAccount = StripeAccount::retrieve($accoutId);  

            //$stripeAccount->external_accounts->create(['external_account' => $stripeToken]); 

            //$stripeAccount->bank_accounts->create(['external_account' => $stripeToken]); 

            StripeCharge::create([
              "amount" => 400,
              "currency" => "usd",
              "customer" => $accoutId,
              "source" => 'card_16m4c7GXcJiLbfUVJE9Yibvn',
              "description" => "Charge for test@example.com"
            ]);    

            return response()->json($stripeAccount);

            

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
    public function show($accountId, $cardId)
    {

        Stripe::setApiKey(\Config::get('stripe.key'));

        try {

            $account = StripeAccount::retrieve($accountId);
            $card = $account->external_accounts->retrieve($cardId);

            

            //return view('accounts.cards.show', ['card' => $card]);    

        } catch (StripeError\Base $e) {

            return $e->getMessage();
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
                    "number" => "4000056655665556",
                    "exp_month" => 12,
                    "exp_year" => 2016,
                    "cvc" => "314",
                    "currency" => "usd"
                ]
            ]);

            return $stripeToken->id;

        } catch (StripeError\Base $e) {

            return $this->sendBackJsonError($e->getHttpStatus());
        }
    }

    public function temp($accountId, $cardId)
    {

        Stripe::setApiKey(\Config::get('stripe.key'));

        try {

            $account = StripeAccount::retrieve($accountId);
            $card = $account->external_accounts->retrieve($cardId);

            $stripeCustomer = StripeCustomer::create([
              "email" => 'email@example.com',
              "description" => "Customer for test@example.com",
              "source" => self::getStripeToken()
            ]);
            echo 'customerID = '.$stripeCustomer->id;

            /*$stripeToken = StripeToken::create($card);
            echo 'token = '.$stripeToken.'<br>';*/

            /*$stripeToken = StripeToken::create([
                "card" => [
                    "number" => "5200828282828210",
                    "exp_month" => 8,
                    "exp_year" => 2018,
                    "cvc" => "314",
                    "currency" => "usd"
                ]
            ]);
            echo 'token = '.$stripeToken.'<br>';*/
            

            StripeCharge::create(array(
              "amount" => 400,
              "currency" => "usd",
              "customer" => $stripeCustomer->id,
              "source" => '',
              "description" => "Charge for test@example.com"
            ));

            return view('accounts.cards.show', ['card' => $card]);    

        } catch (StripeError\Base $e) {

            return $e->getMessage();
        }     
    }
}
