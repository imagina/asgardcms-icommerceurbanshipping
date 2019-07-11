<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'icommerceurbanshipping'], function (Router $router) {
  
  $router->get('/', [
    'as' => 'icommerceurbanshipping.api.agree.init',
    'uses' => 'IcommerceUrbanshippingApiController@init',
  ]);
  
  
  $router->group(['prefix' => '/mapareas'/*,'middleware' => ['auth:api']*/], function (Router $router) {
    $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();
    
    $router->post('/', [
      'as' => $locale . 'api.icommerceurbanshipping.mapareas.create',
      'uses' => 'MapAreaApiController@create',
    ]);
    
    $router->get('/', [
      'as' => $locale . 'api.icommerceurbanshipping.mapareas.index',
      'uses' => 'MapAreaApiController@index',
    ]);
    
    $router->put('/{criteria}', [
      'as' => $locale . 'api.icommerceurbanshipping.mapareas.update',
      'uses' => 'MapAreaApiController@update',
    ]);
    
    $router->delete('/{criteria}', [
      'as' => $locale . 'api.icommerceurbanshipping.mapareas.delete',
      'uses' => 'MapAreaApiController@delete',
    ]);
    
    $router->get('/{criteria}', [
      'as' => $locale . 'api.icommerceurbanshipping.mapareas.show',
      'uses' => 'MapAreaApiController@show',
    ]);
    
  });
  
});