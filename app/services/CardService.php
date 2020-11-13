<?php

class CardService extends Controller
{
    private $__CardModel;
    private $__ColumnModel;
    private $__UserModel;
    private $__CommentModel;
    private $__ChecklistModal;

    public function __construct()
    {
        $this->__CardModel = $this->model('CardModel');
    }

    public function getAllData()
    {
        $this->__UserModel = $this->model('UserModel');
        $this->__ColumnModel = $this->model('ColumnModel');
        $columnList = $this->__ColumnModel->getAllColumn();
        foreach ($columnList as &$column) {
            $cardList = $this->__CardModel->getCardByColumn($column['IDcolumn']);
            foreach ($cardList as &$card) {
                $userList = $this->__UserModel->getUserByCard($card['IDcard']);
                $card['userList'] = $userList;
            }
            $column['cardlist'] = $cardList;
        }
        return $columnList;
    }

    public function setPositionCard($toColumn, $idCard)
    {
        $result = $this->__CardModel->setStateCard($toColumn, $idCard);
        return $result;
    }

    public function addCard($title, $description, $startdate, $duedate, $priority, $idcol)
    {
        $result = $this->__CardModel->addCard($title, $description, $startdate, $duedate, $priority, $idcol);
    }

    public function getCardListByColumn($idcol)
    {
        $this->__UserModel = $this->model('UserModel');
        $cardList = $this->__CardModel->getCardByColumn($idcol);
        foreach ($cardList as &$card) {
            $userList = $this->__UserModel->getUserByCard($card['IDcard']);
            $card['userList'] = $userList;
        }
        return $cardList;
    }

    public function getColumnByIdCard($idCard)
    {
        $IDColumn = $this->__CardModel->getColIDCard($idCard);
        return $IDColumn;
    }

    public function deleteCard($idCard)
    {
        $this->__CardModel->deleteCard($idCard);
    }

    public function getDetailCard($idCard)
    {
        $this->__UserModel = $this->model('UserModel');
        $this->__CommentModel = $this->model('CommentModel');
        $this->__ChecklistModal = $this->model('ChecklistModel');

        $cardDetail = $this->__CardModel->getCardbyID($idCard);
        $userList = $this->__UserModel->getUserByCard($cardDetail['IDcard']);
        $commentList = $this->__CommentModel->getCommentByIDCard($cardDetail['IDcard']);
        foreach ($commentList as &$comment) {
            $user = $this->__UserModel->getuserById($comment['IDuser']);
            $comment['user'] = $user;
        }
        $checklistList = $this->__ChecklistModal->getChecklistByCard($cardDetail['IDcard']);
        $cardDetail['userList'] = $userList;
        $cardDetail['commentList'] = $commentList;
        $cardDetail['checklistList'] = $checklistList;
        return $cardDetail;
    }

    public function setPriorityCard($id, $state)
    {
        $this->__CardModel->setPriorityCard($id, $state);
    }

    public function setStatusCard($id, $state)
    {
        $this->__CardModel->setStatusCard($id, $state);
    }

    public function setTitleCard($id, $title)
    {
        $this->__CardModel->setTitleCard($id, $title);
    }

    public function setDescriptionCard($id, $title)
    {
        $this->__CardModel->setDescription($id, $title);
    }

    public function setStartdateCard($id, $startdate)
    {
        $startdate = substr($startdate, 0, 19);
        $this->__CardModel->setStartdateCard($id, $startdate);
    }

    public function setDuedateCard($id, $duedate)
    {
        $duedate = substr($duedate, 0, 19);
        $this->__CardModel->setDuedateCard($id, $duedate);
    }

    public function getUserNotinCard($idCard)
    {
        $this->__UserModel = $this->model('UserModel');
        $result = $this->__UserModel->getUserNotinCard($idCard);
        return $result;
    }

    public function addUserCard($idUser, $idCard)
    {
        return $this->__CardModel->addUserCard($idUser, $idCard);
    }

    public function delUserCard($idUser, $idCard)
    {
        return $this->__CardModel->delUserCard($idUser, $idCard);
    }
}