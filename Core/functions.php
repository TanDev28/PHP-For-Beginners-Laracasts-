<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

// dd($_SERVER["REQUEST_URI"]);

function urlIs($value)
{
    return $_SERVER["REQUEST_URI"] === $value;
}


function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes); // Biến đổi key thành biến có giá trị là value, vd ["heading" => "Home"] tương đương $heading = "Home"
    // return base_path("views/" . $path);

    require base_path("views/" . $path); // Khi thay return bằng require sẽ gặp tình trạng về phạm vi của biến, nên phải có tham số là mảng chứa biến
}
