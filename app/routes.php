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
$router->post('/addColumn','AjaxcolumnController@add');
$router->post('/deleteColumn','AjaxcolumnController@delete');
$router->post('/editColumn','AjaxcolumnController@edit');
$router->post('/card/changState','AjaxcardController@setPosition');
$router->post('/column/changState','AjaxcolumnController@setPosition');
