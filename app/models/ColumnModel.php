<?php
class ColumnModel extends Database
{
    public function getAllColumn()
    {
        $query="SELECT * FROM `Column` ORDER BY `index`";
        $result=$this->conn->query($query);
        $list = array();
        while($listitem = $result->fetch_assoc()){
            $list[] = $listitem;
        }
        return $list;
    }
}
