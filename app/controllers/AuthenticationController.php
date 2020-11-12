<?php


require_once './app/setup.php';

class AuthenticationController extends Controller
{
    private $__smarty;
    private $__UserModel;
    function __construct()
    {
        $this->__smarty = new Template();
        $this->__smarty->caching = false;
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
                $_SESSION["username"] = $user["username"];
                $_SESSION["iduser"] = $user["IDuser"];
                header("Location:".URL_SERVER."home");
                return;
            }
        }else
        {
            $this->__smarty->assign("message","Login failed");
            $this->__smarty->display("signin_up.tpl");
        }
    }
    public function register()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $username = $_POST["username"];
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
            if (fileService::validateFile($_FILES,$email)) {
                fileService::copyFile($_FILES);
            }else
            {
                $message = "Invalid file";
                $success = false;
                break;
            }
            $user = strstr($email, '@', true);
            $file_key = array_key_first($_FILES);
            $file_type = pathinfo($_FILES[$file_key]["name"], PATHINFO_EXTENSION);
            $filePath = $user.'.'.$file_type;
            $result = $this->__UserModel->addUser($email, $password, $filePath,$username);
            if ($result != 1) {
                $message = "Registration was not successful";
                $success = false;
                break;
            }
            break;
        }
        $this->__smarty->assign("message",$message);
        $this->__smarty->display("signin_up.tpl");
    }
    public function logout()
    {
        unset($_SESSION["email"]);
        unset($_SESSION["image"]);
        unset($_SESSION["create_date"]);
        unset($_SESSION["username"]);
        unset($_SESSION["iduser"]);
        header("Location:".URL_SERVER."login");
        return;
    }
}
