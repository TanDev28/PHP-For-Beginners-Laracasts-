<?php

namespace Core;

use Core\Middleware\Guest;
use Core\Middleware\Auth;

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
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add($uri, $controller, 'GET');
    }

    public function delete($uri, $controller)
    {
        return $this->add($uri, $controller, 'DELETE');
    }

    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, 'POST');
    }

    public function put($uri, $controller)
    {
        return $this->add($uri, $controller, 'PUT');
    }

    public function patch($uri, $controller)
    {
        return $this->add($uri, $controller, 'PATCH');
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        // dd($this->routes); // Kiểm tra coi mảng có những gì
        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                // apply middleware
                if ($route['middleware'] === 'guest') {
                    (new Guest)->handle();
                }

                if ($route['middleware'] === 'auth') {
                    (new Auth)->handle();
                }

                // Tuy nhiên code trên sẽ bị lặp lại ở nhiều nơi, vì thế phải sử dụng middleware để tránh lặp code


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