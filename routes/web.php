<?php


$router->get('/', function () use ($router) {
    return view('index');
});



$router->group(['prefix' => 'api'], function () use ($router) {
   
    $router->post('cadastrar', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    $router->get('perfil', 'UserController@profile');
    
    

    $router->get('menuacai', 'CardapioController@menuAcai');
    $router->post('verificarProduto', 'CardapioController@VerificarProduto');
    $router->get('complementos', 'CardapioController@Complementos');


});
