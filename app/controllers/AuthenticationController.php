<?php


require_once './app/setup.php';

class AuthenticationController extends Controller
{
    private $__smarty;
    private $__UserModel;
    function __construct()
    {
        $this->__smarty = new Template();
        $this->__UserModel = $this->model('UserModel');
    }
    public function login()
    {
        if (empty($_POST)) {
            $this->__smarty->display('signin_up.tpl');
            return;
        }
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = $this->__UserModel->getUser($email);
        if (isset($user) && $user["activated"] == 1) {
            if (password_verify($password, $user["password"])) {
                $_SESSION["email"] = $user["email"];
                $_SESSION["image"] = $user["image"];
                $_SESSION["create_date"] = $user["create_date"];
                header("Location:http://localhost:8080/ezzKanban/home");
                return;
            }
        }
        header("Location:http://localhost:8080/ezzKanban/login");
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

            $user = $this->__UserModel->getUser($email);
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
            $result = $this->__UserModel->addUser($email, $password, $filePath);
            if ($result != 1) {
                $message = "Registration was not successful";
                $success = false;
                break;
            }
            break;
        }
        $this->__smarty->assign('message', $message);
        $this->__smarty->display('signin_up.tpl');
    }
}
