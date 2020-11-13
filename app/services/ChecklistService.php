<?php

class ChecklistService extends Controller
{
    private $__ChecklistModal;

    public function __construct()
    {
        $this->__ChecklistModal = $this->model('ChecklistModel');
    }

    public function addChecklist($idCard, $content)
    {
        $this->__ChecklistModal->addChecklist($idCard, $content);
    }

    public function getChecklistByCard($idCard)
    {
        $checklistList = $this->__ChecklistModal->getChecklistByCard($idCard);
        return $checklistList;
    }

    public function setStatusChecklist($statusChecklist, $idChecklist)
    {
        $this->__ChecklistModal->setStatusChecklist($statusChecklist, $idChecklist);
    }

    public function deleteChecklist($idChecklist)
    {
        $this->__ChecklistModal->deleteChecklist($idChecklist);
    }

}