<?php


require_once './app/setup.php';

class AuthenticationController
{
    private $smarty;
    function __construct()
    {
        $this->smarty = new Template();
    }
    public function login()
    {
        $this->smarty->display('signin_up.tpl');
    }
}
