<?php
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $routes = [
            '/' => 'ProductsController@index',
            '/produtos' => 'ProductsController@index',
            '/produtos/{id}' => 'ProductsController@show',
            '/array' => 'ProgrammingLogicController@iterateOverArray',
            '/csv' => 'ProgrammingLogicController@getCSVFile',
            '/Testdev' => 'IntegrationApiController@index',
            '/Testdev/show/{id}' => 'IntegrationApiController@show'
        ];
        break;
    case 'POST':
        $routes = [
            '/produtos' => 'ProductsController@store',
            '/api/produtos' => 'IntegrationApiController@index',
            '/Testdev/create' => 'IntegrationApiController@store',
            '/Testdev/update/{id}' => 'IntegrationApiController@update'
        ];
        break;
    case 'PUT':
        $routes = [
            '/produtos/{id}' => 'ProductsController@update'
        ];
        break;
    case 'DELETE':
        $routes = [
            '/produtos/{id}' => 'ProductsController@delete',
            '/Testdev/delete/{id}' => 'IntegrationApiController@delete'
        ];
        break;
    default:
        echo "Método desconhecido: " . $method;
        break;
}
