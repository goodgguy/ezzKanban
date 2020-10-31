<?php


require_once './app/setup.php';

class AuthenticationController extends Controller
{
    private $smarty;
    private $UserModel;
    function __construct()
    {
        $this->smarty = new Template();
        $this->UserModel = $this->model('UserModel');
    }
    public function login()
    {
        $this->smarty->display('signin_up.tpl');
    }
    public function register()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $isSuccess = true;
        $message = 'asdasds';

        echo "OK";

        //CHECK TRUE DATA RECIVED
        // if (isset($_POST) || isset($_FILES)) {
        // }

        //CHECK EXISTS EMAIL
        //print_r($this->UserModel->getUser($email));


        //CHECK FILE -COPY FILE
        //UTIL::copyFile($_FILES);


        //ADD DATABASE
        //$this->UserModel->addUser($email, $password, 'tuanquen');

        // $this->smarty->assign('message', $message);
        // $this->smarty->display('signin_up.tpl');
    }
}
