<?php


require_once './app/setup.php';

class ColumnController extends Controller
{
    private $__smarty;
    private $__ColumnModel;
    function __construct()
    {
        $this->__smarty = new Template();
        $this->__smarty->caching = false;
        $this->__ColumnModel=$this->model("ColumnModel");
    }
    public function add()
    {
        $title= $_POST["column"];
        echo $this->__ColumnModel->addColumn($title);
    }
    public function delete()
    {
        $id= $_POST["column"];
        $result=$this->__ColumnModel->deleteColumn($id);
        if($result!=1)
        {
            echo "Erorr when remove";
        }
    }
    public function edit()
    {
        $id= $_POST["column"];
        $title= $_POST["title"];
        $result=$this->__ColumnModel->editColumn($id,$title);
        if($result!=1)
        {
            echo "Erorr when edit";
        }
    }
    public function setPosition()
    {
        $id= $_POST["column"];
        $columnRelatedList= $_POST["columnRelated"];
        $result; 
        foreach($columnRelatedList as $columnRelated)
        {
           $result= $this->__ColumnModel->setStateColumn($id,$columnRelated);
        }
        if($result!=1)
        {
            echo "Erorr";
        }
    }
}
