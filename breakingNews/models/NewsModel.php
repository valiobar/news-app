<?php

class NewsModel extends BaseModel
{
    function getAllNews()
    {
         $statement = self::$db->query("SELECT n.id, n.title,n.content,n.date,n.isActive
from news as n  ORDER by date DESC ");
    //   var_dump($statement);
         return $statement->fetch_all(MYSQLI_ASSOC);
    }
    function createNews(string $title,string $content,string $image):bool
    {
      $statement = self::$db->prepare("INSERT INTO news (title, content,image) VALUES(?,?,?)");
        $statement->bind_param("sss",$title,$content,$image);
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
    public function deleteNews($id){
        $statement = self::$db->prepare("DELETE FROM news WHERE id=?");
        $statement->bind_param("i",$id);
        $statement->execute();

        return $statement->affected_rows==1;
    }
    public function updateNews($id,$title,$content,$image,$isActive){
        $statement = self::$db->prepare("UPDATE news
SET title=?, content=?,image =?,isActive = ?
WHERE id=? ");
        $statement->bind_param("sssii",$title,$content,$image,$isActive,$id);
        $statement->execute();

        return $statement->affected_rows==1;
    }
}
