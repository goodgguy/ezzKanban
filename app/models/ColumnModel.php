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
    public function delete($id)
    {
        $queryupdate = "UPDATE `column` SET activated= 0 WHERE IDcolumn=".$id;
        if (!mysqli_query($this->conn, $queryupdate)) {
            return "Erorr" . mysqli_error($conn);
        }
    }
}
