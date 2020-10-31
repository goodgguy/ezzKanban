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
        if (empty($_POST)) {
            $this->smarty->display('signin_up.tpl');
            die();
        }
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = $this->UserModel->getUser($email);
        if (isset($user) && $user["activated"] == 1) {
            if (password_verify($password, $user["password"])) {
                header("Location:http://localhost:9999/ezzKanban/home");
                die();
            }
        }
        header("Location:http://localhost:9999/ezzKanban/login");
    }
    public function register()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $isSuccess = true;
        $message = '';

        while (1) {
            if (empty($_POST) || empty($_FILES)) {
                $message = "Must require data!";
                $success = false;
                break;
            }

            $user = $this->UserModel->getUser($email);
            if (isset($user)) {
                $message = "Email already exists";
                $success = false;
                break;
            }
            if (!UTIL::copyFile($_FILES)) {
                $message = "Invalid file";
                $success = false;
                break;
            }

            $filePath = "public/img/" . $_FILES["fileToUpload"]["name"];
            $result = $this->UserModel->addUser($email, $password, $filePath);
            if ($result != 1) {
                $message = "Registration was not successful";
                $success = false;
                break;
            }
            break;
        }
        $this->smarty->assign('message', $message);
        $this->smarty->display('signin_up.tpl');
    }
}
