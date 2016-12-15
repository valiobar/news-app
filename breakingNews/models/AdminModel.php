<?php

class AdminModel extends BaseModel
{

    public function login(string $username,string $password)
    {
       $statement=self::$db->prepare("SELECT id,password_hash from users WHERE  username = ?");
        $statement->bind_param("s",$username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        if(password_verify($password,$result['password_hash'])){
            return $result['id'];
        }
        return false;
    }



    function getUsers():array
    {
    $statement = self::$db->query("SELECT * FROM users ORDER BY username");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }


    function getUserById($id){
        $statement = self::$db->query("SELECT * FROM users where id=$id");
        return $statement->fetch_assoc();
    }


}
