<?php
    error_reporting(0);
    $dbcon=new mysqli("localhost","root","","kantapp");

    if($dbcon->connect_error)
    {
        die("Error ".$dbcon->connect_error);
    }

    #how to check table exist

    function checkTable($sql)
    {
        global $dbcon;

        $result=$dbcon->query($sql);
        if($result)
            return true;
        else
            return false;
    }

    function addPost($title,$by,$body)
    {
        global $dbcon;

        $sql="INSERT INTO `post` (`post_id`, `post_title`, `post_by`, `body`) VALUES (NULL, ?, ?, ?)";

        $stm=$dbcon->prepare($sql);
        $stm->bind_param("sss",$title,$by,$body);
        $result=$stm->execute();
        $stm->close();
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function viewPost()
    {
        global $dbcon;

        $stm=$dbcon->prepare("select `post_id`, `post_title`, `post_by`, `body` from post");

        $stm->execute();

        $stm->bind_result($id,$title,$by,$body);

        

        while($stm->fetch())
        {
            $data[]=array(
                'id'=>$id,
                'title'=>$title,
                'by'=>$by,
                'body'=>$body,
            );
        }
        return $data;
    }

    
?>