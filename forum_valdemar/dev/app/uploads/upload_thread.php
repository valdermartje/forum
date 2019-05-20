<?php
session_start();
include_once('../helpers/db.php');

if(isset($_POST['add_thread'])){
    $title = $_POST['title'];
    // $photo = $_POST['photo'];
    $content = $_POST['content'];

    if(dbConnect()) {
        dbQuery(
            "SELECT * FROM threads 
                WHERE title = :title
                AND content = :content
                -- AND users_id = :id", 
            [':title' => $title,
            ':content' => $content,
            //  ':id' => $id
            ]
        );

        dbQuery(
            "INSERT INTO threads(title, content, datum, users_id) VALUES (:title, :content, :datum, :id)",
            [
                ':title'=> $title,
                ':content' => $content,
                ':datum' => date("d-m-Y H:i:s", time()),
                ':id' =>  $_SESSION['user_id']
            ]
        );
        
        $_SESSION['success'] = 'Thread is aangemaakt!!';
        header('Location: ../../threads.php');
        exit(0);
    }

}