<?php


class TestController extends Controller
{
    private $__CardModel;


    function __construct()
    {
        $this->__CardModel = $this->model('CardModel');
    }

    public function test()
    {
        $stop = "IDuser";
        $cardDetail = $this->__CardModel->getCardDetailWithUser(7);
        foreach ($cardDetail[0] as $key => $value) {
            if ($key == $stop) {
                break;
            }
            $test[$key] = $value;
        }
        $test['userList'] = $cardDetail;


        echo "<pre>";
        print_r($test);
        echo "</pre>";
    }
}
