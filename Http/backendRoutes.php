<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/icommerceurbanshipping'], function (Router $router) {
    $router->bind('icommerceurbanshipping', function ($id) {
        return app('Modules\Icommerceurbanshipping\Repositories\IcommerceurbanshippingRepository')->find($id);
    });
    $router->get('icommerceurbanshippings', [
        'as' => 'admin.icommerceurbanshipping.icommerceurbanshipping.index',
        'uses' => 'IcommerceurbanshippingController@index',
        'middleware' => 'can:icommerceurbanshipping.icommerceurbanshippings.index'
    ]);
    $router->get('icommerceurbanshippings/create', [
        'as' => 'admin.icommerceurbanshipping.icommerceurbanshipping.create',
        'uses' => 'IcommerceurbanshippingController@create',
        'middleware' => 'can:icommerceurbanshipping.icommerceurbanshippings.create'
    ]);
    $router->post('icommerceurbanshippings', [
        'as' => 'admin.icommerceurbanshipping.icommerceurbanshipping.store',
        'uses' => 'IcommerceurbanshippingController@store',
        'middleware' => 'can:icommerceurbanshipping.icommerceurbanshippings.create'
    ]);
    $router->get('icommerceurbanshippings/{icommerceurbanshipping}/edit', [
        'as' => 'admin.icommerceurbanshipping.icommerceurbanshipping.edit',
        'uses' => 'IcommerceurbanshippingController@edit',
        'middleware' => 'can:icommerceurbanshipping.icommerceurbanshippings.edit'
    ]);
    $router->put('icommerceurbanshippings/{icommerceurbanshipping}', [
        'as' => 'admin.icommerceurbanshipping.icommerceurbanshipping.update',
        'uses' => 'IcommerceurbanshippingController@update',
        'middleware' => 'can:icommerceurbanshipping.icommerceurbanshippings.edit'
    ]);
    $router->delete('icommerceurbanshippings/{icommerceurbanshipping}', [
        'as' => 'admin.icommerceurbanshipping.icommerceurbanshipping.destroy',
        'uses' => 'IcommerceurbanshippingController@destroy',
        'middleware' => 'can:icommerceurbanshipping.icommerceurbanshippings.destroy'
    ]);
// append

});
