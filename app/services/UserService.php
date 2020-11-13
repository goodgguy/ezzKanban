<?php

class UserService extends Controller
{
    private $__UserModel;

    function __construct()
    {
        return $this->__UserModel = $this->model('UserModel');
    }

    public function getUserByEmail($email)
    {
        return $this->__UserModel->getUser($email);
    }

    public function addUser($email, $password, $filePath, $username)
    {
        return $this->__UserModel->addUser($email, $password, $filePath, $username);
    }
}