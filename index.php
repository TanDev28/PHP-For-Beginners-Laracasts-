<?php

require "functions.php";
// require "router.php";

class Person
{
    public $name;
    public $age;

    public function breathe()
    {
        echo "$this->name is breathing";
    }
}

$person = new Person();
$person->name = "Tân";
$person->age = 25;

// dd($person);
// dd($person->name);
// dd($person->age);
// dd($person->breathe());
$person->breathe();