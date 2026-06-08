<?php

namespace Core;

class Router
{

    protected $routes = [];


    //Lưu ý thêm vào mảng
    // $this->routes[] = [
    //         'uri' => $uri,
    //         'controller' => $controller,
    //         'method' => 'GET'
    //     ];
    // khác với ghi đè
    // $this->routes = [
    //         'uri' => $uri,
    //         'controller' => $controller,
    //         'method' => 'GET'
    //     ];

    public function add($uri, $controller, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function get($uri, $controller)
    {
        $this->add($uri, $controller, 'GET');
    }

    public function delete($uri, $controller)
    {
        $this->add($uri, $controller, 'DELETE');
    }

    public function post($uri, $controller)
    {
        $this->add($uri, $controller, 'POST');
    }

    public function put($uri, $controller)
    {
        $this->add($uri, $controller, 'PUT');
    }

    public function patch($uri, $controller)
    {
        $this->add($uri, $controller, 'PATCH');
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }
        $this->abort();
    }

    function abort($code = 404) // Dùng protected để không có ai tự ý sử dụng làm sập hệ thống
    {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }
}



// function routeToController($uri, $routes)
// {
//     if (array_key_exists($uri, $routes)) {
//         require base_path($routes[$uri]);
//     } else {
//         abort();
//     }
// }