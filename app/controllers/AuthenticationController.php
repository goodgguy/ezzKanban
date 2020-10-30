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
        if (isset($_FILES)) {
            print_r($_FILES);
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password = password_hash($password, PASSWORD_DEFAULT);
            //Check Exception
            //...

        }
    }
}
