<?php


$router->get('/', function () use ($router) {
    return $router->app->version();
});



$router->group(['prefix' => 'api'], function () use ($router) {
   
    $router->post('cadastrar', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    $router->get('perfil', 'UserController@profile');
    $router->get('users/{id}', 'UserController@singleUser');
    $router->get('users', 'UserController@allUsers');


});
