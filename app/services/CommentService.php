<?php

class CommentService extends Controller
{
    private $__CommentModel;

    public function __construct()
    {
        return $this->__CommentModel = $this->model('CommentModel');
    }

    public function addCommentByCard($idCard, $message, $user)
    {
        return $this->__CommentModel->addComment($idCard, $message, $user);
    }

    public function getCommentByIdCard($idCard)
    {
        return $this->__CommentModel->getCommentByIDCard($idCard);
    }

    public function getListCommentByCard($idCard, $userService)
    {
        $commentList = $this->getCommentByIdCard($idCard);
        foreach ($commentList as &$comment) {
            $user = $userService->getuserById($comment['IDuser']);
            $comment['user'] = $user;
        }
        return $commentList;
    }
}
