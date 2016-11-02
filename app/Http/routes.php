<?php

/* ################# Public Routes ################# */
$router->group(['namespace' => 'Admin'], function($router) {
	$router->get('/', 'PagesController@home');
});