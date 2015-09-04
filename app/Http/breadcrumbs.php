<?php

Breadcrumbs::register('account.index', function($breadcrumbs)
{
    $breadcrumbs->push('Account', route('account.index'));
});

Breadcrumbs::register('account.create', function($breadcrumbs)
{
	$breadcrumbs->parent('account.index');
    $breadcrumbs->push('Create Account', route('account.create'));
});

// account > {id}
Breadcrumbs::register('account.show', function($breadcrumbs, $account)
{
    $breadcrumbs->parent('account.index');
    $breadcrumbs->push($account->email, route('account.show', $account->id));
});


/*Breadcrumbs::register('create', function($breadcrumbs)
{
	$breadcrumbs->parent();
    $breadcrumbs->push('Account', route('account.index'));
});  */