@extends('app')

@section('breadcrumbs', Breadcrumbs::render('accounts.show', $account))

@section('content')
<h2>Account Detail</h2>

<div class="row">
	<div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Information</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-2">id: </div>
                    <div class="col-sm-10">{!! $account->id !!}</div>
                </div>
                <div class="row">
                    <div class="col-sm-2">email: </div>
                    <div class="col-sm-10">{!! $account->email !!}</div>
                </div>
                <div class="row">
                    <div class="col-sm-2">default currency: </div>
                    <div class="col-sm-10">{!! $account->default_currency !!}</div>
                </div>
                <div class="row">
                    <div class="col-sm-2">country: </div>
                    <div class="col-sm-10">{!! $account->country !!}</div>
                </div>
            </div>
            <!-- <div class="panel-footer">
                <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
            </div> -->
        </div>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">External Account</h3>
            </div>
            <div class="panel-body">
                @if (count($account->external_accounts->data) > 0)
                <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>last4</th>
                            <th>brand</th>
                            <th>exp month</th>
                            <th>exp year</th>
                            <th>fingerprint</th>
                            <th>country</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($account->external_accounts->data as $externalAccount)
                        <tr>
                            <td><a href="/accounts/{!! $externalAccount->account !!}/cards/{!! $externalAccount->id !!}">{!! $externalAccount->id !!}</a></td>
                            <td>{!! $externalAccount->last4 !!}</td>
                            <td>{!! $externalAccount->brand !!}</td>
                            <td>{!! $externalAccount->exp_month !!}</td>
                            <td>{!! $externalAccount->exp_year !!}</td>
                            <td>{!! $externalAccount->fingerprint !!}</td>
                            <td>{!! $externalAccount->country !!}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                @else
                    Data not found.
                @endif
            </div>
        </div>
	</div>
</div>
@stop
