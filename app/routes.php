<?php
//GET
$router->get('/', function () {
    echo 'home';
});
$router->get('/login', 'AuthenticationController@login');
$router->get('/home', 'HomeController@index');
$router->get('/logout', 'AuthenticationController@logout');
$router->get('/getboard', 'AjaxcardController@getData');

//POST
$router->post('/login', 'AuthenticationController@login');
$router->post('/register', 'AuthenticationController@register');
