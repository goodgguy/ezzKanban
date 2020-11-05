<?php


require_once './app/setup.php';

class AjaxcolumnController extends Controller
{
    private $__smarty;
    private $__AjaxcolumnController;
    function __construct()
    {
        $this->__smarty = new Template();
        $this->__smarty->caching = false;
        $this->__AjaxcolumnController=$this->model("ColumnModel");
    }
    public function add()
    {
        // echo $_POST["column"];
        $this->__AjaxcolumnController->addColumn();
    }
}
