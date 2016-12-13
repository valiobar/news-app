<?php

class HomeModel extends BaseModel
{
    function getLastNews(int $maxCount = 5)
    {
         $statement = self::$db->query("SELECT n.id, n.title,n.content,n.date
from news as n ORDER by date DESC limit 10");
    //   var_dump($statement);
         return $statement->fetch_all(MYSQLI_ASSOC);
    }
     function getNewsById(int $id)
     {
         $statement = self::$db->query("SELECT id, title,content,date
from news  WHERE id = $id");
         var_dump($statement);
       //  $statement->bind_param("i",$id);

     // $result= $statement->get_result()->fetch_assoc();
         return $statement->fetch_assoc();
     }
}
