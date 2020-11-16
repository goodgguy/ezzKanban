<?php


require_once './app/setup.php';
require_once './app/resource/resource.php';

class CardController extends Controller
{
    private $__smarty;
    private $__CardService;
    private $__CommentService;
    private $__ChecklistService;

    function __construct()
    {
        $this->__smarty = new Template();
        $this->__smarty->caching = false;
        $this->__CardService = $this->service('CardService');
        $this->__CommentService = $this->service('CommentService');
        $this->__ChecklistService = $this->service('ChecklistService');
    }

    public function getData()
    {
        $columnService = $this->service('ColumnService');
        $columnList = $this->__CardService->getAllData($columnService);
        echo json_encode($columnList);
    }

    public function setPosition()
    {
        $toColumn = $_POST["toColumn"];
        $idCard = $_POST["idCard"];
        $result = $this->__CardService->setPositionCard($toColumn, $idCard);
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
        $cardServiceAddCardArgs = array($title, $description, $startdate, $duedate, $priority, $idcol);
        $result = call_user_func_array(array($this->__CardService, "addCard"), $cardServiceAddCardArgs);
        if ($result != -1) {
            $cardList = $this->__CardService->getCardListByColumn($idcol);
            echo json_encode($cardList);
        }
    }

    public function delete()
    {
        $idCard = $_POST["card"];
        $IDColumn = $this->__CardService->getColumnByIdCard($idCard);
        $this->__CardService->deleteCard($idCard);
        $cardList = $cardList = $this->__CardService->getCardListByColumn($IDColumn);
        $response = array(
            "card" => $cardList,
            "idcol" => $IDColumn,
        );
        echo json_encode($response);
    }

    public function getDetail()
    {
        $CommentService = $this->service("CommentService");
        $UserService = $this->service("UserService");
        $ChecklistService = $this->service("ChecklistService");
        $idCard = $_POST['card'];
        $cardServiceGetDetailArgs = array($idCard, $CommentService, $UserService, $ChecklistService);
        $cardDetail = call_user_func_array(array($this->__CardService, "getDetailCard"), $cardServiceGetDetailArgs);
        echo json_encode($cardDetail);
    }

    public function setPriority()
    {
        $state = $_POST['priority'];
        $id = $_POST['id'];
        $this->__CardService->setPriorityCard($id, $state);
    }

    public function setStatus()
    {
        $state = $_POST['priority'];
        $id = $_POST['id'];
        $this->__CardService->setStatusCard($id, $state);
    }

    public function setTitle()
    {
        $title = $_POST["title"];
        $id = $_POST["id"];
        $this->__CardService->setTitleCard($id, $title);
    }

    public function setDescription()
    {
        $title = $_POST["description"];
        $id = $_POST["id"];
        $this->__CardService->setDescriptionCard($id, $title);
    }

    public function setStartdate()
    {
        $startdate = dateService::convertDate($_POST["startdate"]);
        $id = $_POST["id"];
        $this->__CardService->setStartdateCard($id, $startdate);
    }

    public function setDuedate()
    {
        $duedate = dateService::convertDate($_POST["duedate"]);
        $id = $_POST["id"];
        $this->__CardService->setDuedateCard($id, $duedate);
    }

    public function getUsernotIn()
    {
        $idCard = $_POST['card'];
        $result = $this->__CardService->getUserNotinCard($idCard);
        echo json_encode($result);
    }

    public function addUser()
    {
        $idCard = $_POST['cardID'];
        $idUser = $_POST['userID'];
        echo $this->__CardService->addUserCard($idUser, $idCard);
    }

    public function delUser()
    {
        $idCard = $_POST['cardID'];
        $idUser = $_POST['userID'];
        echo $this->__CardService->delUserCard($idUser, $idCard);
    }

    public function addMessage()
    {
        $userService = $this->service('UserService');
        $idCard = $_POST['card'];
        $message = $_POST['mess'];
        $user = $_SESSION['iduser'];
        $this->__CommentService->addCommentByCard($idCard, $message, $user);
        $commentList = $this->__CommentService->getListCommentByCard($idCard, $userService);
        echo json_encode($commentList);
    }

    public function addChecklist()
    {
        $idCard = $_POST['card'];
        $content = $_POST['contentchecklist'];
        $this->__ChecklistService->addChecklist($idCard, $content);
        $checklistList = $this->__ChecklistService->getChecklistByCard($idCard);
        echo json_encode($checklistList);
    }

    public function setChecklist()
    {
        $idChecklist = $_POST['id'];
        $statusChecklist = $_POST['statusChecklist'];
        $this->__ChecklistService->setStatusChecklist($statusChecklist, $idChecklist);
    }

    public function deleteChecklist()
    {
        $idChecklist = $_POST['id'];
        $this->__ChecklistService->deleteChecklist($idChecklist);
    }
}
