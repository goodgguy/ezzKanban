<?php
//GET
$router->get('/', function () {
    echo 'home';
});
$router->get('/login', 'AuthenticationController@login');
$router->get('/home', 'HomeController@index');
$router->get('/logout', 'AuthenticationController@logout');
$router->get('/getboard', 'CardController@getData');


//POST
$router->post('/login', 'AuthenticationController@login');
$router->post('/register', 'AuthenticationController@register');
$router->post('/addColumn', 'ColumnController@add');
$router->post('/deleteColumn', 'ColumnController@delete');
$router->post('/editColumn', 'ColumnController@edit');
$router->post('/card/changState', 'CardController@setPosition');
$router->post('/card/add', 'CardController@addCard');
$router->post('/card/delete', 'CardController@delete');
$router->post('/card/getDetail', 'CardController@getDetail');
$router->post('/card/setPriority', 'CardController@setPriority');
$router->post('/card/setStatus', 'CardController@setStatus');
$router->post('/card/setTitle', 'CardController@setTitle');
$router->post('/card/setDescription', 'CardController@setDescription');
$router->post('/card/setStartdate', 'CardController@setStartdate');
$router->post('/card/setDuedate', 'CardController@setDuedate');
$router->post('/card/getUsernotIn', 'CardController@getUsernotIn');
$router->post('/card/addUser', 'CardController@addUser');
$router->post('/card/delUser', 'CardController@delUser');
$router->post('/card/addMessage', 'CardController@addMessage');
$router->post('/card/addChecklist', 'CardController@addChecklist');
$router->post('/column/changState', 'ColumnController@setPosition');
