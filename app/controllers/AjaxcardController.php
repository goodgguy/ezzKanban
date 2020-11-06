<?php


require_once './app/setup.php';
require_once './app/resource/resource.php';
class AjaxcardController extends Controller
{
    private $__smarty;
    private $__CardModel;
    private $__UserModel;
    private $__ColumnModel;
    function __construct()
    {
        $this->__smarty = new Template();
        $this->__smarty->caching = false;
        $this->__CardModel=$this->model('CardModel');
        $this->__ColumnModel=$this->model('ColumnModel');
        $this->__UserModel = $this->model('UserModel');
    }
    public function getData()
    {
        $columnList=$this->__ColumnModel->getAllColumn();
        foreach ($columnList as &$column)
        {
            $cardList=$this->__CardModel->getCardByColumn($column['IDcolumn']);
            foreach ($cardList as &$card)
            {
                $userList=$this->__UserModel->getUserByCard($card['IDcard']);
                $card['userList']=$userList;
            }
            $column['cardlist']=$cardList;
        }
        echo json_encode($columnList);
    }
    public function setPosition()
    {
        $toColumn= $_POST["toColumn"];
        $idCard= $_POST["idCard"];
        echo $idCard;
    }
}
