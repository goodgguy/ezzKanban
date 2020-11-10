<?php
class CommentModel extends Database
{
    public function getCommentByIDCard($idCard){
        $query = "SELECT * FROM `comment` WHERE IDcard=?";
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
}
