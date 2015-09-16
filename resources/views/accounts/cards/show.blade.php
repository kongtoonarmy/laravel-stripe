@extends('app')

@section('breadcrumbs', Breadcrumbs::render('accounts.cards.show', $card))

@section('content')
<h2>The card detail from account</h2>

<div class="row">
	<div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Card Information</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-2">id: </div>
                    <div class="col-sm-10">{!! $card->id !!}</div>
                </div>
                <div class="row">
                    <div class="col-sm-2">object: </div>
                    <div class="col-sm-10">{!! $card->object !!}</div>
                </div>
                <div class="row">
                    <div class="col-sm-2">last4: </div>
                    <div class="col-sm-10">{!! $card->last4 !!}</div>
                </div>
                <div class="row">
                    <div class="col-sm-2">brand: </div>
                    <div class="col-sm-10">{!! $card->brand !!}</div>
                </div>
                <div class="row">
                    <div class="col-sm-2">funding: </div>
                    <div class="col-sm-10">{!! $card->funding !!}</div>
                </div>
                <div class="row">
                    <div class="col-sm-2">exp month: </div>
                    <div class="col-sm-10">{!! $card->exp_month !!}</div>
                </div>
                <div class="row">
                    <div class="col-sm-2">exp year: </div>
                    <div class="col-sm-10">{!! $card->exp_year !!}</div>
                </div>
                <div class="row">
                    <div class="col-sm-2">country: </div>
                    <div class="col-sm-10">{!! $card->country !!}</div>
                </div>
                <div class="row">
                    <div class="col-sm-2">cvc check: </div>
                    <div class="col-sm-10">{!! $card->cvc_check !!}</div>
                </div>
                <div class="row">
                    <div class="col-sm-2">account: </div>
                    <div class="col-sm-10">{!! $card->account !!}</div>
                </div>
            </div>
        </div>
	</div>
</div>
@stop
