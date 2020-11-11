<?php
class UserModel extends Database
{
    public function getAllUser()
    {
        $query = "SELECT * FROM USER";
        $result = mysqli_query($this->con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            // var_dump($row);
        }
        mysqli_free_result($result);
    }
    public function addUser($email, $password, $filename, $username)
    {
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
        $date = date("Y-m-d H:i:s");
        $query = "insert into user (email,password,image,create_date,activated,username) value (?,?,?,?,1,?);";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssss", $email, $passwordHashed, $filename, $date, $username);
        return $stmt->execute(); //1 if successs

    }
    public function getUser($email)
    {
        $query = "SELECT * FROM ql_kanban.user where email like ?;";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    public function getUserByCard($idCard)
    {
        $query = "SELECT * FROM user_card INNER JOIN USER ON user_card.IDuser=USER.IDuser WHERE Idcard=?;";
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
    public function getUserNotinCard($idCard)
    {
        $query = "  SELECT * FROM USER WHERE IDuser NOT IN (SELECT IDuser FROM user_card WHERE IDcard=?);";
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
    public function getuserById($idUser)
    {
        $query = "SELECT * FROM ql_kanban.user where IDuser = ?;";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idUser);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
