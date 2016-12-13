<?php

class NewsModel extends BaseModel
{
    function getAllNews()
    {
         $statement = self::$db->query("SELECT id, title,content,date
from news  ORDER by date DESC ");
    //   var_dump($statement);
         return $statement->fetch_all(MYSQLI_ASSOC);
    }
    function createNews(string $title,string $content):bool
    {
      $statement = self::$db->prepare("INSERT INTO news (title, content) VALUES(?,?)");
        $statement->bind_param("ss",$title,$content);
        $statement->execute();
        return $statement->affected_rows==1;
    }
    public function getById($id){
        $statement = self::$db->prepare("SELECT * FROM news WHERE id=?");
        $statement->bind_param("i",$id);
        $statement->execute();
        $result=$statement->get_result()->fetch_assoc();
        return $result;
    }
    public function deletePost($id){
        $statement = self::$db->prepare("DELETE FROM news WHERE id=?");
        $statement->bind_param("i",$id);
        $statement->execute();

        return $statement->affected_rows==1;
    }
}
