<?php


require_once './app/setup.php';

class ColumnController extends Controller
{
    private $__smarty;
    private $__ColumnService;

    function __construct()
    {
        $this->__smarty = new Template();
        $this->__smarty->caching = false;
        $this->__ColumnService = $this->service("ColumnService");
    }

    public function add()
    {
        $title = $_POST["title"];
        echo $this->__ColumnService->addColumn($title);
    }

    public function delete()
    {
        $id = $_POST["column"];
        $result = $this->__ColumnService->deleteColumn($id);
        if ($result != 1) {
            echo "Erorr when remove";
        }
    }

    public function edit()
    {
        $id = $_POST["column"];
        $title = $_POST["title"];
        $result = $this->__ColumnService->editColumn($id, $title);
        if ($result != 1) {
            echo "Erorr when edit";
        }
    }

    public function setPosition()
    {
        $id = $_POST["column"];
        $columnRelatedList = $_POST["columnRelated"];
        $result = 0;
        foreach ($columnRelatedList as $columnRelated) {
            $result = $this->__ColumnService->setStateColumn($id, $columnRelated);
        }
        if ($result != 1) {
            echo "Erorr";
        }
    }
}
