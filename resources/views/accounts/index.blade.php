@extends('app')

@section('breadcrumbs', Breadcrumbs::render('accounts.index'))

@section('content')
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
			<td><a href="/accounts/{!! $account->id !!}">{!! $account->id !!}</a></td>
			<td>{!! $account->email !!}</td>
			<td>{!! $account->country !!}</td>
			<td><a href="{!! route('accounts.edit', $account->id) !!}" class="btn btn-info">Edit</a></td>
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
<a href="/accounts/create/" role="button" class="btn btn-success">Create</a>
@stop

	
