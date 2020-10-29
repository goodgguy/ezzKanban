<?php

// action là callback
$router->get('/', function () {
    echo 'home';
});
$router->get('/tuanquen/{id}', 'HomeController@index');
