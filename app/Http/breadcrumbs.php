<?php

// accounts
Breadcrumbs::register('accounts.index', function($breadcrumbs)
{
    $breadcrumbs->push('Account', route('accounts.index'));
});

// accounts -> create
Breadcrumbs::register('accounts.create', function($breadcrumbs)
{
	$breadcrumbs->parent('accounts.index');
    $breadcrumbs->push('Create Account', route('accounts.create'));
});

// accounts > {id}
Breadcrumbs::register('accounts.show', function($breadcrumbs, $account)
{
    $breadcrumbs->parent('accounts.index');
    $breadcrumbs->push($account->email, route('accounts.show', $account->id));
});

// accounts > {accountId} -> cards
Breadcrumbs::register('accounts.cards.index', function($breadcrumbs)
{
	$breadcrumbs->parent('accounts.index');
    $breadcrumbs->push('Cards', route('accounts.cards.index'));
});

// accounts > {accountId} -> cards -> {cardId}
Breadcrumbs::register('accounts.cards.show', function($breadcrumbs, $card)
{
	$breadcrumbs->parent('accounts.cards.index');
    $breadcrumbs->push($card->id, route('accounts.cards.show', $card->id));
});


/*Breadcrumbs::register('create', function($breadcrumbs)
{
	$breadcrumbs->parent();
    $breadcrumbs->push('Account', route('account.index'));
});  */