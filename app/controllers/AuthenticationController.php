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
        $message = '';

        while (1) {
            if (!isset($_POST) || !isset($_FILES)) {
                $message = "Must require data!";
                $success = false;
                break;
            }

            $user = $this->UserModel->getUser($email);
            if (isset($use)) {
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
