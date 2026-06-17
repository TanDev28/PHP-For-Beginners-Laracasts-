<?php

$_SESSION['name'] = 'Tân';

view("index.view.php", [
    'heading' => 'Home'
]);