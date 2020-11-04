<?php


require_once './app/setup.php';

class AjaxcardController extends Controller
{
    private $__smarty;
    private $__CardModel;
    private $__ColumnModel;
    function __construct()
    {
        $this->__smarty = new Template();
        $this->__smarty->caching = false;
        $this->__CardModel=$this->model('CardModel');
        $this->__Column=$this->model('ColumnModel');
    }
    public function getData()
    {
        $cardList=$this->__CardModel->getCardByColumn(1);
        $columnList=$this->__Column->getAllColumn();
        foreach ($columnList as $column)
        {
            $column['cardlist']=array();
            foreach ($cardList as $card)
            {
                if($card['IDcolumn']===$column['IDcolumn'])
                {
                    array_push($column['cardlist'],$card);
                }
            }
        }
//        echo "<pre>";
//        print_r($columnList);
//        echo "</pre>";
    }
}
