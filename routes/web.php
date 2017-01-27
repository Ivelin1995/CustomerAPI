<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function() use ($app) {
    return "RESTful API for EasyMarkit by Ivelin Ivanov";
});

$app->group(['prefix' => 'api/v1'], function () use ($app) {

    $app->get('customers', 'CustomerController@index');

    $app->get('customers/{id}', 'CustomerController@getCustomer');

    $app->post('customers', 'CustomerController@createCustomer');

    $app->delete('customers/{id}', 'CustomerController@deleteCustomer');

    $app->put('customers/{id}', 'CustomerController@updateCustomer');
});


