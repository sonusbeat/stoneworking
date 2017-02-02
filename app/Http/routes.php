<?php
/* ################# Admin Routes ################# */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/', [
        'as' => 'admin.config.dashboard',
        'uses' => 'ConfigController@dashboard'
    ]);
    /* --------------------------- Users --------------------------- */
    Route::patch('users/status/{id}', [
        'as'   => 'admin.users.status',
        'uses' => 'UsersController@status'
    ]);
    Route::resource('users', 'UsersController');

    /* --------------------------- Categories --------------------------- */
    Route::patch('categories/status/{id}', [
        'as'   => 'admin.categories.status',
        'uses' => 'CategoriesController@status'
    ]);

    Route::resource('categories', 'CategoriesController');

    /* --------------------------- Works --------------------------- */
    Route::patch('works/status/{id}', [
        'as'   => 'admin.works.status',
        'uses' => 'WorksController@status'
    ]);
    Route::resource('categories.works', 'WorksController');
});

// Authentication routes...
Route::get('admin/login', 'Auth\AuthController@getLogin');
Route::post('admin/login', 'Auth\AuthController@postLogin');
Route::get('admin/logout', 'Auth\AuthController@getLogout');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

/* ################# Public Routes ################# */
$router->group(['namespace' => 'Admin'], function($router) {
	$router->get('/', [
		'as' => 'homepage',
		'uses' => 'PagesController@home'
	]);

    $router->get('trabajos-realizados', [
        'as' => 'public.categories',
        'uses' => 'PagesController@categories'
    ]);

    $router->get('cubiertas-para-{category}', [
        'as' => 'public.category.works',
        'uses' => 'PagesController@categoryWorks'
    ]);

    $router->get('trabajos-realizados/{work}', [
        'as' => 'public.work',
        'uses' => 'PagesController@work'
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

    $router->get('{work}', [
        'as' => 'single-work',
        'uses' => 'PagesController@singleWork'
    ]);
});