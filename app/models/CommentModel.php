<?php

class CommentModel extends Database
{
    public function getCommentByIDCard($idCard)
    {
        $query = "SELECT * FROM `comment` WHERE IDcard=? ORDER BY IDcomment DESC";
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

    public function addComment($idCard, $content, $idUser)
    {
        $date = date("Y-m-d H:i:s");
        $query = "INSERT INTO `comment` (content,create_date,IDcard,IDuser) VALUE (?,?,?,?);";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssii", $content, $date, $idCard, $idUser);
        return $stmt->execute();
    }
}
