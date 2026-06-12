<?php

namespace Core;

class Container
{

    protected $bindings = [];

    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }
    // Lúc này mảng $bindings có dạng:
    // [
    // 'Core\Database' => function () {
    // $config = require base_path("config.php");
    // return new Database($config["database"]);
    // }
    // ]

    public function resolve($key)
    {
        if (! array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching binding found for {$key}");
        }
        $resolver = $this->bindings[$key]; // Lúc này $resolver chỉ là hàm nên phải dùng câu lệnh dưới để thực thi hàm đó
        return call_user_func($resolver);
    }
}