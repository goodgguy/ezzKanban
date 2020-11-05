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
    public function addColumn($title)
    {
        $query = "INSERT INTO `Column` (title,`index`,activated) VALUE (?,-1,1);";
        $queryupdate = ' UPDATE tutorials_inf SET name="althamas" WHERE name="ram"';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $title);
        $stmt->execute(); 
        if (mysqli_query($this->conn, $queryupdate)) {
            return "Record updated successfully";
        } else {
            return "Error updating record: " . mysqli_error($conn);
        }
    }
}
