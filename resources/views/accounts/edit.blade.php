@extends('app')

@section('breadcrumbs', Breadcrumbs::render('accounts.create'))

@section('content')
	<h2>Edit Account</h2>
	{!! Form::model($account, [
			'route' => ['accounts.update', $account->id], 
			'method' => 'PATH'
		]) 
	!!}
		
	<legend>Personal Information</legend>	
	<div class="form-group">
		{!! Form::label('Email', 'Email') !!}
		{!! Form::text('email', $account->email, [
				'class' => 'form-control',
				'size' => '40'
			]) 
		!!}
	</div>

	<legend>External Account</legend>
	<div class="form-group">
		{!! Form::label('Email', 'Email') !!}
		{!! Form::text('email', $account->email, [
				'class' => 'form-control',
				'size' => '40'
			]) 
		!!}
	</div>	
	<div class="form-group">
		{!! Form::label('externalType', 'External Type') !!}
		{!! Form::select('extAcctType', [
				'add' => 'Add New',
				'update' => 'Update'
			], null, [
				'class' => 'form-control'
			]) 
		!!}
	</div>	

	{!! Form::submit('Update', ['class' => 'btn btn-info']) !!}
	{!! Form::close() !!}
@stop