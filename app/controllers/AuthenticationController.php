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

        //CHECK TRUE DATA RECIVED

        //CHECK EXISTS EMAIL


        //CHECK FILE -COPY FILE
        //UTIL::copyFile($_FILES);


        //ADD DATABASE
        //$this->UserModel->addUser($email, $password, 'tuanquen');
    }
}
