<?php
class ColumnModel extends Database
{
    public function getAllColumn()
    {
        $query="SELECT * FROM `Column` WHERE activated=1 ORDER BY `index`";
        $result=$this->conn->query($query);
        $list = array();
        while($listitem = $result->fetch_assoc()){
            $list[] = $listitem;
        }
        return $list;
    }
    public function addColumn($title)
    {
        $query = "INSERT INTO `Column` (title,`index`,activated) VALUE (?,-1,1);";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $title);
        $stmt->execute(); 
        $lastIDinserted=$this->conn->insert_id;
        $queryupdate = "UPDATE `column` SET `index`= IDcolumn WHERE IDcolumn=".$lastIDinserted;
        if (mysqli_query($this->conn, $queryupdate)) {
            return "Success";
        } else {
            return "Erorr" . mysqli_error($conn);
        }
    }
    public function deleteColumn($id)
    {
        $queryupdate = "UPDATE `column` SET activated= 0 WHERE IDcolumn=?";
        $stmt = $this->conn->prepare($queryupdate);
        $stmt->bind_param("i",$id);
        return $stmt->execute();
    }
    public function editColumn($id,$title)
    {
        $queryupdate = "UPDATE `column` SET title= ? WHERE IDcolumn=?";
        $stmt = $this->conn->prepare($queryupdate);
        $stmt->bind_param("si", $title,$id);
        return $stmt->execute();
    }
    public function setStateColumn($idCol,$idColRelated)
    {
        $queryupdate = "UPDATE `column` a
        INNER JOIN `column` b ON a.IDcolumn<>b.IDcolumn
        SET a.index=b.index,b.index=a.index
        WHERE a.IDcolumn=? AND b.IDcolumn=?";
        $stmt = $this->conn->prepare($queryupdate);
        $stmt->bind_param("ii", $idCol,$idColRelated);
        return $stmt->execute();
    }
}
