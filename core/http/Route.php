<?php


class Route
{
    private $__routes;
    private $__disableRoutes;

    public function __construct()
    {
        $this->__routes = [];
        $this->__disableRoutes = [];
        array_push($this->__disableRoutes, $this->__setDisRoute("AuthenticationController", "login"));
        array_push($this->__disableRoutes, $this->__setDisRoute("AuthenticationController", "register"));
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
        require_once PATH_ROOT . '/app/commonservices/fileService.php';
        require_once PATH_ROOT . '/app/commonservices/dateService.php';
        if (is_callable($action)) {
            call_user_func_array($action, $params);
            return;
        }
        if (is_string($action)) {
            $action = explode('@', $action);
            foreach ($this->__disableRoutes as $disroute) {
                if ($disroute["controller"] != $action[0] && $disroute["action"] != $action[1] && empty($_SESSION)) {
                    $action[0] = "AuthenticationController";
                    $action[1] = "login";
                } else if ($disroute["controller"] == $action[0] && $disroute["action"] == $action[1] && !empty($_SESSION)) {
                    $action[0] = "HomeController";
                    $action[1] = "index";
                }
            }
            require_once PATH_ROOT . '/app/controllers/' . $action[0] . '.php';
            $controller = new $action[0];
            call_user_func_array([$controller, $action[1]], $params);
            return;
        }
    }

    private function __setDisRoute($controller, $action)
    {
        return [
            "controller" => $controller,
            "action" => $action
        ];
    }
}
