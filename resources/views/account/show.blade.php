@extends('app')

@section('breadcrumbs', Breadcrumbs::render('account.show', $account))

@section('content')
<h2>Account Detail</h2>

<div class="row">
	<div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{!! $account->email !!}</h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>id:</td>
                        <td>{!! $account->id !!}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>{!! $account->email !!}</td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
	</div>
</div>
@stop
