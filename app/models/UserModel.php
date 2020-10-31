<?php
class UserModel extends Database
{
    function getAllUser()
    {
        $query = "SELECT * FROM USER";
        $result = mysqli_query($this->con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            var_dump($row);
        }
        mysqli_free_result($result);
    }
    function addUser($email, $password, $filename)
    {
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
        $date = date("Y-m-d H:i:s");
        $query = "insert into user (email,password,image,create_date,activated) value (?,?,?,?,1);";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss", $email, $passwordHashed, $filename, $date);
        return $stmt->execute(); //1 if successs
    }
    public function getuser($email)
    {
    }
}
