<?php

class Core {

    public function run($routes)
    {
        $url = '/';

        isset($_GET['url']) ? $url .= $_GET['url'] : '';

        $routerFound = false;

        foreach ($routes as $path => $controller) {
            $pattern = '#^' . preg_replace('/{id}/', '(\w+)', $path) . '$#';

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches);

                $routerFound = true;

                [$currentController, $action] = explode('@', $controller);

                require_once __DIR__ . "/../app/controllers/$currentController.php";

                $newController = new $currentController();
                
                // Passa os parâmetros capturados para o método do controlador
                call_user_func_array([$newController, $action], $matches);
                
                break;
            }
        }

        if (!$routerFound) {
            require_once __DIR__ . "/../app/controllers/NotFoundController.php";
            $controller = new NotFoundController();
            $controller->index();
        }
    }

}