<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Account</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

</head>
<body>
	<div class="container">
	<h2>Create New Account</h2>
	<form action="/account/store" method="POST" id="payment-form">
		<span class="payment-errors"></span>

		<div class="form-group">
			<label>
			  <span>Your email</span>
			  <input type="text" size="20" name="email" class="form-control">
			</label>
		</div>

		<div class="form-group">
			<label>
			  <span>Country (US)</span>
			  <input type="text" size="20" name="country" data-stripe="number" class="form-control">
			</label>
		</div>

		<div class="form-group">
			<label>
				<span>Managed</span>
				<select class="form-control" name="managed">
				<option value="false">false</option>
				<option value="true" selected>true</option>
				</select>
			</label>
		</div>

		<button type="submit" class="btn btn-primary">Submit Payment</button>
		<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	</form>
	</div>
</body>
</html>