<?php


require_once './app/setup.php';
require_once './app/resource/resource.php';
class CardController extends Controller
{
    private $__smarty;
    private $__CardModel;
    private $__UserModel;
    private $__ColumnModel;
    private $__CommentModel;
    private $__ChecklistModal;
    function __construct()
    {
        $this->__smarty = new Template();
        $this->__smarty->caching = false;
        $this->__CardModel = $this->model('CardModel');
        $this->__ColumnModel = $this->model('ColumnModel');
        $this->__UserModel = $this->model('UserModel');
        $this->__CommentModel = $this->model('CommentModel');
        $this->__ChecklistModal = $this->model('ChecklistModel');
    }
    public function getData()
    {
        $columnList = $this->__ColumnModel->getAllColumn();
        foreach ($columnList as &$column) {
            $cardList = $this->__CardModel->getCardByColumn($column['IDcolumn']);
            foreach ($cardList as &$card) {
                $userList = $this->__UserModel->getUserByCard($card['IDcard']);
                $card['userList'] = $userList;
            }
            $column['cardlist'] = $cardList;
        }
        echo json_encode($columnList);
    }
    public function setPosition()
    {
        $toColumn = $_POST["toColumn"];
        $idCard = $_POST["idCard"];
        $result = $this->__CardModel->setStateCard($toColumn, $idCard);
        if ($result == 1) {
            return "Erorr";
        }
    }
    public function addCard()
    {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $startdate = dateService::convertDate($_POST["startdate"]);
        $duedate = dateService::convertDate($_POST["duedate"]);
        $priority = $_POST["priority"];
        $idcol = $_POST["idcol"];
        $result = $this->__CardModel->addCard($title, $description, $startdate, $duedate, $priority, $idcol);
        if ($result != -1) {
            $cardList = $this->__CardModel->getCardByColumn($idcol);
            foreach ($cardList as &$card) {
                $userList = $this->__UserModel->getUserByCard($card['IDcard']);
                $card['userList'] = $userList;
            }
            echo json_encode($cardList);
        }
    }
    public function delete()
    {
        $idCard = $_POST["card"];
        $IDColumn = $this->__CardModel->getColIDCard($idCard);
        $this->__CardModel->deleteCard($idCard);
        $cardList = $this->__CardModel->getCardByColumn($IDColumn);
        foreach ($cardList as &$card) {
            $userList = $this->__UserModel->getUserByCard($card['IDcard']);
            $card['userList'] = $userList;
        }
        $response = array(
            "card" => $cardList,
            "idcol" => $IDColumn,
        );
        echo json_encode($response);
    }
    public function getDetail()
    {
        $card = $_POST['card'];
        $cardDetail = $this->__CardModel->getCardbyID($card);
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
        echo json_encode($cardDetail);
    }
    public function setPriority()
    {
        $state = $_POST['priority'];
        $id = $_POST['id'];
        $this->__CardModel->setPriorityCard($id, $state);
    }
    public function setStatus()
    {
        $state = $_POST['priority'];
        $id = $_POST['id'];
        $this->__CardModel->setStatusCard($id, $state);
    }
    public function setTitle()
    {
        $title = $_POST["title"];
        $id = $_POST["id"];
        $this->__CardModel->setTitleCard($id, $title);
    }
    public function setDescription()
    {
        $title = $_POST["description"];
        $id = $_POST["id"];
        $this->__CardModel->setDescription($id, $title);
    }
    public function setStartdate()
    {
        $startdate = dateService::convertDate($_POST["startdate"]);
        $id = $_POST["id"];
        $startdate = substr($startdate, 0, 19);
        $this->__CardModel->setStartdateCard($id, $startdate);
    }
    public function setDuedate()
    {
        $duedate = dateService::convertDate($_POST["duedate"]);
        $id = $_POST["id"];
        $duedate = substr($duedate, 0, 19);
        $this->__CardModel->setDuedateCard($id, $duedate);
    }
    public function getUsernotIn()
    {
        $idCard = $_POST['card'];
        $result = $this->__UserModel->getUserNotinCard($idCard);
        echo json_encode($result);
    }
    public function addUser()
    {
        $idCard = $_POST['cardID'];
        $idUser = $_POST['userID'];
        echo $this->__CardModel->addUserCard($idUser, $idCard);
    }
    public function delUser()
    {
        $idCard = $_POST['cardID'];
        $idUser = $_POST['userID'];
        echo $this->__CardModel->delUserCard($idUser, $idCard);
    }
    public function addMessage()
    {
        $idCard = $_POST['card'];
        $message = $_POST['mess'];
        $user = $_SESSION['iduser'];
        $this->__CommentModel->addComment($idCard, $message, $user);
        $commentList = $this->__CommentModel->getCommentByIDCard($idCard);
        foreach ($commentList as &$comment) {
            $user = $this->__UserModel->getuserById($comment['IDuser']);
            $comment['user'] = $user;
        }
        echo json_encode($commentList);
    }
    public function addChecklist()
    {
        $idCard = $_POST['card'];
        $content = $_POST['contentchecklist'];
        $this->__ChecklistModal->addChecklist($idCard, $content);
        $checklistList = $this->__ChecklistModal->getChecklistByCard($idCard);
        echo json_encode($checklistList);
    }
    public function setChecklist()
    {
        $idChecklist = $_POST['id'];
        $statusChecklist = $_POST['statusChecklist'];
        $this->__ChecklistModal->setStatusChecklist($statusChecklist, $idChecklist);
    }
    public function deleteChecklist()
    {
        $idChecklist = $_POST['id'];
        $this->__ChecklistModal->deleteChecklist($idChecklist);
    }
}
