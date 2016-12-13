<?php

class UsersModel extends BaseModel
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


    public  function register(string $username,string $password,string $full_name,string $image,string $description)
    {

      $password_hash = password_hash($password,PASSWORD_DEFAULT);
        $statement  = self::$db->prepare("INSERT INTO users(username, password_hash, full_name,image,description) VALUE (?,?,?,?,?)");

        $statement->bind_param("sssss",$username,$password_hash,$full_name, $image,$description);

        $statement->execute();

        if ($statement->affected_rows != 1){
            return false;
        }
        $user_id = self::$db->query("SELECT LAST_INSERT_ID()")->fetch_row()[0];
        return $user_id;

    }
    function getUsers():array
    {
    $statement = self::$db->query("SELECT * FROM users ORDER BY username");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }
    function getUsersImg($id)
    {
        $statement = self::$db->query("SELECT image FROM users where id=$id");
        return $statement->fetch_row()[0];
    }

    function getUserById($id){
        $statement = self::$db->query("SELECT * FROM users where id=$id");
        return $statement->fetch_assoc();
    }
    function getUserPosts($id):array
    {
        $statement = self::$db->query("SELECT * FROM posts where user_id=$id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }
    function getUserAlbums($id):array
    {
        $statement = self::$db->query("SELECT * FROM albums where user_id=$id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }
}
