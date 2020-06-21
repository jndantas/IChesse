<?php

Route::group([

'prefix' => 'v1',
    'namespace' => 'Api'
], function () {
    Route::get('/tenants/{uuid}', 'TenantController@show');
    Route::get('/tenants', 'TenantController@index');

    Route::get('/categories/{url}', 'CategoryController@show');
    Route::get('/categories', 'CategoryController@categoriesByTenant');

    Route::get('/tables/{identify}', 'TableController@show');
    Route::get('/tables', 'TableController@tablesByTenant');

    Route::get('/products/{flag}', 'ProductController@show');
    Route::get('/products', 'ProductController@productsByTenant');
});
