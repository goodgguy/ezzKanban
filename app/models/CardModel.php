<?php
class CardModel extends Database
{
    public function getCardByColumn($id)
    {
        $query = "SELECT * FROM card WHERE IDcolumn=?;";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $list = array();
        while($listitem = $result->fetch_assoc()){
            $list[] = $listitem;
        }
        return $list;
    }
}
