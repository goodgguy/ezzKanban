<?php

class ColumnService extends Controller
{
    private $__ColumnModel;

    function __construct()
    {
        return $this->__ColumnModel = $this->model("ColumnModel");
    }

    public function addColumn($title)
    {
        return $this->__ColumnModel->addColumn($title);
    }

    public function deleteColumn($id)
    {
        return $this->__ColumnModel->deleteColumn($id);
    }

    public function editColumn($id, $title)
    {
        return $this->__ColumnModel->editColumn($id, $title);
    }

    public function setStateColumn($id, $columnRelated)
    {
        return $this->__ColumnModel->setStateColumn($id, $columnRelated);
    }

    public function getAllColumn()
    {
        return $this->__ColumnModel->getAllColumn();
    }
}
