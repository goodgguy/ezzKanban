<?php


class Route
{
    private $__routes;

    public function __construct()
    {
        $this->__routes = [];
    }

    public function get(string $url, $action)
    {
        $this->__request($url, 'GET', $action);
    }

    public function post(string $url, $action)
    {
        $this->__request($url, 'POST', $action);
    }

    private function __request(string $url, string $method, $action)
    {
        if (preg_match_all('/({([a-zA-Z]+)})/', $url, $params)) {
            $url = preg_replace('/({([a-zA-Z]+)})/', '(.+)', $url);
        }

        $url = str_replace('/', '\/', $url);

        $route = [
            'url' => $url,
            'method' => $method,
            'action' => $action,
            'params' => $params[2]
        ];
        array_push($this->__routes, $route);
    }

    public function map(string $url, string $method)
    {
        foreach ($this->__routes as $route) {

            if ($route['method'] == $method) {
                // if (isset($_SESSION)) {
                //     $this->__call_action_route('AuthenticationController@login', array());
                //     return;
                // }
                $reg = '/^' . $route['url'] . '$/';
                if (preg_match($reg, $url, $params)) {
                    array_shift($params);
                    $this->__call_action_route($route['action'], $params);
                    return;
                }
            }
        }

        echo '404 - Not Found';
        return;
    }
    private function __call_action_route($action, $params)
    {
        require_once PATH_ROOT . '/core/Database.php';
        require_once PATH_ROOT . '/core/Controller.php';
        require_once PATH_ROOT . '/app/util/UTIL.php';
        if (is_callable($action)) {
            call_user_func_array($action, $params);
            return;
        }
        if (is_string($action)) {
            $action = explode('@', $action);
            require_once PATH_ROOT . '/app/controllers/' . $action[0] . '.php';
            $controller = new $action[0];
            call_user_func_array([$controller, $action[1]], $params);

            return;
        }
    }
}
