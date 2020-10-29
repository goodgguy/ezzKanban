<?php

$router->get('/', function () {
    echo 'home';
});
$router->get('/login', 'AuthenticationController@login');
$router->post('/login', 'AuthenticationController@login');
