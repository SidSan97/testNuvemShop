<?php
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $routes = [
            '/' => 'ProductsController@index',
            '/produtos' => 'ProductsController@index',
            '/produtos/{id}' => 'ProductsController@show',
            '/array' => 'ProgrammingLogicController@iterateOverArray',
            '/csv' => 'ProgrammingLogicController@getCSVFile'
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
