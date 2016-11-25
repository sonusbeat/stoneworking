<?php

/* ################# Public Routes ################# */
$router->group(['namespace' => 'Admin'], function($router) {
	$router->get('/', [
		'as' => 'homepage',
		'uses' => 'PagesController@home'
	]);

	$router->get('cotizacion', [
		'as' => 'quote',
		'uses' => 'QuotesController@show'
	]);

	$router->post('process-quote', [
		'as' => 'process-quote',
		'uses' => 'QuotesController@processQuote'
	]);

	$router->get('solicitud-enviada', [
		'as' => 'quote-thanks',
		'uses' => 'QuotesController@quoteThanks'
	]);
});