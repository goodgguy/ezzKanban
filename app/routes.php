<?php
//GET
$router->get('/', function () {
    echo 'home';
});
$router->get('/login', 'AuthenticationController@login');

//POST
$router->post('/login', 'AuthenticationController@login');
$router->post('/register', 'AuthenticationController@register');
