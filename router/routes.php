<?php
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $routes = [
            '/produtos' => 'ProductsController@index',
            '/produtos/{id}' => 'ProductsController@show'
        ];
        break;
    case 'POST':
        $routes = [
            '/produtos' => 'ProductsController@store'
        ];
        break;
    case 'PUT':
        $routes = [
            '/produtos/{id}' => 'ProductsController@update'
        ];
        break;
    case 'DELETE':
        $routes = [
            '/produtos/{id}' => 'ProductsController@delete'
        ];
        break;
    default:
        echo "Método desconhecido: " . $method;
        break;
}
