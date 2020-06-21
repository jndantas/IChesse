<?php

Route::post('/sanctum/token', '\Auth\AuthClientController@auth');

Route::group([
    'middleware' => ['auth:sanctum']
], function () {
    Route::get('/auth/me', 'API\Auth\AuthClientController@me');
    Route::post('/auth/logout', 'API\Auth\AuthClientController@logout');
    Route::post('/auth/v1/orders', 'API\OrderApiController@store');
});

Route::group([
'prefix' => 'v1',
    'namespace' => 'API'
], function () {
    Route::get('/tenants/{uuid}', 'TenantApiController@show');
    Route::get('/tenants', 'TenantApiController@index');

    Route::get('/categories/{identify}', 'CategoryController@show');
    Route::get('/categories', 'CategoryController@categoriesByTenant');

    Route::get('/tables/{identify}', 'TableController@show');
    Route::get('/tables', 'TableController@tablesByTenant');

    Route::get('/products/{identify}', 'ProductController@show');
    Route::get('/products', 'ProductController@productsByTenant');


    Route::post('/client', 'Auth\RegisterController@store');

    Route::post('/orders', 'OrderApiController@store');
    Route::get('/orders/{identify}', 'OrderApiController@show');
});
