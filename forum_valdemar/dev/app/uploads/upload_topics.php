<?php
session_start();
include_once('../helpers/db.php');

if(isset($_POST['add_topic'])){
    $title = $_POST['titel'];
    $content = $_POST['content'];
    // $photo = $_POST['photo'];
    
    
    if(dbConnect()) {
        dbQuery(
            "SELECT * FROM topic 
                WHERE titel = :titel
                AND content = :content", 
            [':titel' => $title,
            ':content' => $content
            ]
        );
            
        dbQuery(
            "INSERT INTO topic(titel, content, datum, user_id) VALUES (:titel, :content, :datum, :id)",
            [
                ':titel'=> $title,
                ':content' => $content,
                ':datum' => date("d-m-Y H:i:s", time()),
                ':id' =>  $_SESSION['user_id']  
            ]
        );
        
        header('Location: ../../topic.php');
        exit(0);
    }

}