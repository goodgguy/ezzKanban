<?php

class ChecklistModel extends Database
{
    public function getChecklistByCard($idCard)
    {
        $query = "SELECT * FROM checklist WHERE IDcard=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idCard);
        $stmt->execute();
        $result = $stmt->get_result();
        $list = array();
        while ($listitem = $result->fetch_assoc()) {
            $list[] = $listitem;
        }
        return $list;
    }

    public function addChecklist($idCard, $content)
    {
        $query = "INSERT INTO `checklist` (content,STATUS,IDcard) VALUE (?,0,?);";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $content, $idCard);
        return $stmt->execute();
    }

    public function setStatusChecklist($status, $IDchecklist)
    {
        $queryupdate = "UPDATE checklist SET status = ? WHERE IDchecklist=?";
        $stmt = $this->conn->prepare($queryupdate);
        $stmt->bind_param("si", $status, $IDchecklist);
        return $stmt->execute();
    }

    public function deleteChecklist($idChecklist)
    {
        $queryupdate = "DELETE FROM checklist WHERE IDchecklist=?";
        $stmt = $this->conn->prepare($queryupdate);
        $stmt->bind_param("i", $idChecklist);
        return $stmt->execute();
    }
}
