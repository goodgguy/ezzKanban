<?php


require_once './app/setup.php';

class HomeController extends Controller
{
    private $__smarty;
    function __construct()
    {
        $this->__smarty = new Template();
        $this->__smarty->caching = false;
    }
    public function index()
    {
        $this->__smarty->display('homepage.tpl');
    }
}
