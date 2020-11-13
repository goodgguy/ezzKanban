<?php

class CardModel extends Database
{
    public function getCardByColumn($id)
    {
        $query = "SELECT * FROM card WHERE IDcolumn=? ORDER BY IDcolumn DESC;";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $list = array();
        while ($listitem = $result->fetch_assoc()) {
            $list[] = $listitem;
        }
        return $list;
    }

    public function setStateCard($idColumn, $idCard)
    {
        $queryupdate = "UPDATE card SET IDcolumn= ? WHERE IDcard=?";
        $stmt = $this->conn->prepare($queryupdate);
        $stmt->bind_param("ii", $idColumn, $idCard);
        return $stmt->execute();
    }

    public function addCard($title, $description, $startdate, $duedate, $priority, $idcol)
    {
        $date = date("Y-m-d H:i:s");
        $pri = ($priority ? 1 : 0);
        $query = "INSERT INTO card (startdate,duedate,status,description,title,priority,create_date,IDcolumn) VALUE (?,?,0,?,?,?,?,?);";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssisi", $startdate, $duedate, $description, $title, $pri, $date, $idcol);
        $result = $stmt->execute();
        if ($result != 1) {
            return -1;
        }
        return $lastIDinserted = $this->conn->insert_id;
    }

    public function deleteCard($idCard)
    {
        $queryupdate = "DELETE FROM card WHERE IDcard = ?";
        $stmt = $this->conn->prepare($queryupdate);
        $stmt->bind_param("i", $idCard);
        return $stmt->execute();
    }

    public function getColIDCard($idCard)
    {
        $query = "SELECT IDcolumn FROM ql_kanban.card where IDcard = ?;";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idCard);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc()["IDcolumn"];
    }

    public function getCardbyID($IDcard)
    {
        $query = "SELECT * FROM ql_kanban.card where IDcard = ?;";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $IDcard);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function setPriorityCard($id, $priority)
    {
        $queryupdate = "UPDATE card SET priority= ? WHERE IDcard=?";
        $stmt = $this->conn->prepare($queryupdate);
        $stmt->bind_param("ii", $priority, $id);
        return $stmt->execute();
    }

    public function setStatusCard($id, $status)
    {
        $queryupdate = "UPDATE card SET `status`= ? WHERE IDcard=?";
        $stmt = $this->conn->prepare($queryupdate);
        $stmt->bind_param("ii", $status, $id);
        return $stmt->execute();
    }

    public function setTitleCard($id, $title)
    {
        $queryupdate = "UPDATE card SET title= ? WHERE IDcard=?";
        $stmt = $this->conn->prepare($queryupdate);
        $stmt->bind_param("si", $title, $id);
        return $stmt->execute();
    }

    public function setDescription($id, $description)
    {
        $queryupdate = "UPDATE card SET `description`= ? WHERE IDcard=?";
        $stmt = $this->conn->prepare($queryupdate);
        $stmt->bind_param("si", $description, $id);
        return $stmt->execute();
    }

    public function setStartdateCard($id, $startdate)
    {
        $queryupdate = "UPDATE card SET startdate= ? WHERE IDcard=?";
        $stmt = $this->conn->prepare($queryupdate);
        $stmt->bind_param("si", $startdate, $id);
        return $stmt->execute();
    }

    public function setDuedateCard($id, $duedate)
    {
        $queryupdate = "UPDATE card SET duedate= ? WHERE IDcard=?";
        $stmt = $this->conn->prepare($queryupdate);
        $stmt->bind_param("si", $duedate, $id);
        return $stmt->execute();
    }

    public function addUserCard($userID, $cardID)
    {
        $queryupdate = "INSERT INTO user_card (IDcard,IDuser) VALUE (?,?);";
        $stmt = $this->conn->prepare($queryupdate);
        $stmt->bind_param("ii", $cardID, $userID);
        return $stmt->execute();
    }

    public function delUserCard($userID, $cardID)
    {
        $queryupdate = "  DELETE FROM user_card
        WHERE IDcard = ? AND IDuser=?";
        $stmt = $this->conn->prepare($queryupdate);
        $stmt->bind_param("ii", $cardID, $userID);
        return $stmt->execute();
    }
}
