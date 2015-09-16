@extends('app')

@section('breadcrumbs', Breadcrumbs::render('account.create'))

@section('content')
<h2>Create New Card</h2>
<form action="/cards" method="POST" id="payment-form">
	<span class="payment-errors"></span>

	<div class="form-group">
		<label>
		  <span>Account Id</span>
		  <input type="text" size="20" name="accountId" class="form-control">
		</label>
	</div>
	<div class="form-group">
		<label>
		  <span>External Account</span>
		  <input type="text" size="20" name="externalAccount" class="form-control">
		</label>
	</div>

	<button type="submit" class="btn btn-primary">Submit Payment</button>
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
</form>
@stop
