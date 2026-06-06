<?php

const BASE_PATH = __DIR__ . "/../"; // Lấy đường dẫn thư mục gốc (hiện tại là public) xong lùi ra một thư mục

require BASE_PATH . "functions.php";

spl_autoload_register(function ($class) {
    require base_path("Core/{$class}.php");
});

require base_path("router.php");