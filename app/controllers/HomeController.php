<?php


require_once './app/setup.php';

class HomeController
{
    private $smarty;
    function __construct()
    {
        $this->smarty = new Template();
    }
    public function index($id)
    {
        $this->smarty->assign('Name', $id);
        $this->smarty->display('test.tpl');
    }
}
