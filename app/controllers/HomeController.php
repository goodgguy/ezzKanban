<?php


require_once './app/setup.php';

class HomeController extends Controller
{
    private $smarty;
    function __construct()
    {
        $this->smarty = new Template();
    }
    public function index()
    {
        echo "HOME PAGE";
    }
}
