<?php


require_once './app/setup.php';

class AuthenticationController extends Controller
{
    private $__smarty;
    private $__UserService;

    function __construct()
    {
        $this->__smarty = new Template();
        $this->__smarty->caching = false;
        $this->__UserService = $this->service('UserService');
    }

    public function login()
    {
        if (empty($_POST)) {
            $this->__smarty->display('signin.tpl');
            return;
        }
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = $this->__UserService->getUserByEmail($email);
        if (isset($user) && $user["activated"] == 1) {
            if (password_verify($password, $user["password"])) {
                $_SESSION["email"] = $user["email"];
                $_SESSION["image"] = $user["image"];
                $_SESSION["create_date"] = $user["create_date"];
                $_SESSION["username"] = $user["username"];
                $_SESSION["iduser"] = $user["IDuser"];
                header("Location:" . URL_SERVER . "home");
                return;
            }
        } else {
            $this->__smarty->assign("message", "Login failed");
            $this->__smarty->display("signin.tpl");
        }
    }

    public function register()
    {
        if (empty($_POST)) {
            $this->__smarty->display('signup.tpl');
            return;
        }
        $email = $_POST["email"];
        $password = $_POST["password"];
        $username = $_POST["username"];
        $isSuccess = true;
        $message = 'Successful !!! Welcome';
        while (1) {
            if (empty($_POST) || empty($_FILES)) {
                $message = "Must require data!";
                $success = false;
                break;
            }

            $user = $this->__UserService->getUserByEmail($email);
            if (isset($user)) {
                $message = "Email already exists";
                $success = false;
                break;
            }
            if (fileService::validateFile($_FILES, $email)) {
                fileService::copyFile($_FILES);
            } else {
                $message = "Invalid file";
                $success = false;
                break;
            }
            $filePath = fileService::getFilepath($user, $_FILES, $email);
            $result = $this->__UserService->addUser($email, $password, $filePath, $username);
            if ($result != 1) {
                $message = "Registration was not successful";
                $success = false;
                break;
            }
            break;
        }
        $this->__smarty->assign("message", $message);
        $this->__smarty->display("signup.tpl");
    }

    public function logout()
    {
        unset($_SESSION["email"]);
        unset($_SESSION["image"]);
        unset($_SESSION["create_date"]);
        unset($_SESSION["username"]);
        unset($_SESSION["iduser"]);
        header("Location:" . URL_SERVER . "login");
        return;
    }
}
