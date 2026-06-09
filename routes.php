<?php

// return [
//     "/" => "controllers/index.php",
//     "/contact" => "controllers/contact.php",
//     "/notes" => "controllers/notes/index.php",
//     "/notes/create" => "controllers/notes/create.php",
//     "/note" => "controllers/notes/show.php",
//     "/about" => "controllers/about.php"
// ];

$router->get('/', 'controllers/index.php');
$router->get('/contact', 'controllers/contact.php');
$router->get('/about', 'controllers/about.php');

$router->get('/notes', 'controllers/notes/index.php');
$router->post('/notes', 'controllers/notes/store.php');
$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');
$router->get('/notes/create', 'controllers/notes/create.php');