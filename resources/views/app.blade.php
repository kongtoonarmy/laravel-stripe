<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
		
</head>
<body>
	 
<nav class="navbar navbar-default">
	<div class="container">

	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<a class="navbar-brand" href="#">Stripe API</a>
	</div>
	
	<ul class="nav navbar-nav navbar-right">
		<li><a href="/account">Account</a></li>
		<li><a href="#">Charge</a></li>
	</ul>	

	</div>
</nav>

<div class="container">
	@yield('content')
</div>

</body>
</html>  