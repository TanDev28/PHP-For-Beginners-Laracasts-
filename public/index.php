<?php

const BASE_PATH = __DIR__ . "/../"; // Lấy đường dẫn thư mục gốc (hiện tại là public) xong lùi ra một thư mục

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {
    // dd($class); // Xem lại $class khi dùng namespace Core\Database
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

$router = new Core\Router();
$routes = require base_path("routes.php");

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD']; // shorthand: $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
