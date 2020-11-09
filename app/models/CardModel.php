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
    public function addCard($title, $description, $startdate, $duedate, $priority,$idcol)
    {
        $date = date("Y-m-d H:i:s");
        $pri=($priority?1:0);
        $query = "INSERT INTO card (startdate,duedate,status,description,title,priority,create_date,IDcolumn) VALUE (?,?,0,?,?,?,?,?);";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssisi", $startdate,$duedate,$description,$title,$pri,$date,$idcol);
        return $result=$stmt->execute();
        if($result!=1)
        {
            return -1;
        }
        return $lastIDinserted = $this->conn->insert_id;
    }
}
