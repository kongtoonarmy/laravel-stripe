<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Customer Detail</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	@if ($customerRetrieve != '')
	<table class="table table-striped">
		<tbody>
		<tr>
			<td>Customer ID: </td>
			<td>{!! $customerRetrieve->id !!}</td>
		</tr>
		<tr>
			<td>Email: </td>
			<td>{!! $customerRetrieve->email !!}</td>
		</tr>
		<tr>
			<td>Description: </td>
			<td>{!! $customerRetrieve->description !!}</td>
		</tr>
		<tr>
			<td>Card ID: </td>
			<td>{!! $customerRetrieve->sources->data[0]->id !!}</td>
		</tr>
		<tr>
			<td>Card Brand: </td>
			<td>{!! $customerRetrieve->sources->data[0]->brand !!}</td>
		</tr>
		<tr>
			<td>Card exp month: </td>
			<td>{!! $customerRetrieve->sources->data[0]->exp_month !!}</td>
		</tr>
		<tr>
			<td>Card exp year: </td>
			<td>{!! $customerRetrieve->sources->data[0]->exp_year !!}</td>
		</tr>
		</tbody>
	</table> 
	@endif
	</div>
</body>
</html>