<?php 

$router->get('', 'PageController@index');
$router->get('about', 'PageController@about');
$router->get('contact', 'PageController@contact');
$router->get('posts', 'PostController@index');

$router->post('posts', 'PostController@post');
$router->post('posts/:id', 'PostController@update');
