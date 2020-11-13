<?php

class ChecklistService extends Controller
{
    private $__ChecklistModal;

    public function __construct()
    {
        return $this->__ChecklistModal = $this->model('ChecklistModel');
    }

    public function addChecklist($idCard, $content)
    {
        return $this->__ChecklistModal->addChecklist($idCard, $content);
    }

    public function getChecklistByCard($idCard)
    {
        return $this->__ChecklistModal->getChecklistByCard($idCard);
    }

    public function setStatusChecklist($statusChecklist, $idChecklist)
    {
        return $this->__ChecklistModal->setStatusChecklist($statusChecklist, $idChecklist);
    }

    public function deleteChecklist($idChecklist)
    {
        return $this->__ChecklistModal->deleteChecklist($idChecklist);
    }

}