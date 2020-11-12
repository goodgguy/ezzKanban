<?php
class CommentService extends Controller
{
    private $__CommentModel;
    private $__UserModel;
    public function __construct()
    {
        $this->__CommentModel = $this->model('CommentModel');
    }
    public function addCommentByCard($idCard, $message, $user)
    {
        $this->__CommentModel->addComment($idCard, $message, $user);
    }
    public function getListCommentByCard($idCard)
    {
        $this->__UserModel = $this->model('UserModel');
        $commentList = $this->__CommentModel->getCommentByIDCard($idCard);
        foreach ($commentList as &$comment) {
            $user = $this->__UserModel->getuserById($comment['IDuser']);
            $comment['user'] = $user;
        }
        return $commentList;
    }
}