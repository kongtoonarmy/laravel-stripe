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
	<h2>Edit Account</h2>
	{{ Form::model($account, array('route' => array('account.update', $account->id), 'method' => 'PUT')) }}
		

		
	{{ Form::close() }}
</div>
</body>
</html>