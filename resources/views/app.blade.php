<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title> 

	
</head>
<body>
	 
@include('_partials.nav')
 
<div class="container">

	@yield('breadcrumbs')	

	@yield('content')
</div>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
		
</body>
</html>  