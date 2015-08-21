<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List Account</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

</head>
<body>
	<div class="container">
		<h3>List Account</h3>
		<div>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Email</th>
					<th>Counthy</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($accounts as $account)
				<tr>
					<td>{!! $account->id !!}</td>
					<td>{!! $account->email !!}</td>
					<td>{!! $account->country !!}</td>
					<td><button type="button" class="btn btn-info">Edit</button></td>
					<td>
						{!! Form::open([
							'method' => 'DELETE', 
							'id' => 'formAccountDelete', 
							'action' => ['AccountController@destroy', $account->id]
							]) 
						!!}
						{!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger'] ) !!}
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		</div>
		<hr>
		<a href="/account/create/" role="button" class="btn btn-success">Create</a>
	</div>
</body>
</html>