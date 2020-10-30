<?php

define('PATH_ROOT', __DIR__);
require_once PATH_ROOT . '/core/http/Route.php';
$router = new Route();
include_once PATH_ROOT . '/app/routes.php';
$request_url = !empty($_GET['url']) ? '/' . $_GET['url'] : '/';
$method_url = !empty($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';
$router->map($request_url, $method_url);
