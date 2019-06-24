<?php
session_start();
include_once('../helpers/db.php');

if(!$_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: ../../threads.php');
    exit(0);
}

if(isset($_POST['add_thread'])){
    $title = $_POST['title'];
    $content = $_POST['content'];

    // dit is voor de foto
    $imagefileHandle = fopen($_FILES['photo']['tmp_name'], 'rb');
    $imageData = fread($imagefileHandle, filesize($_FILES['photo']['tmp_name']));
    fclose($imagefileHandle);

    // hier worden de threads gemaakt, uploads voor de naam heb ik uitgekozen omdat het een upload wordt
    if(dbConnect()) {       
        dbQuery(
            "INSERT INTO threads(title, content, foto_thread, datum, users_id) VALUES (:title, :content, :foto_thread, :datum, :id)",
            [
                ':title'=> $title,
                ':content' => $content,
                ':foto_thread' => $imageData,
                ':datum' => date("d-m-Y H:i:s", time()),
                ':id' =>  $_SESSION['user_id']
            ]
        );
        
        $_SESSION['success'] = 'Thread is aangemaakt!!';
        header('Location: ../../threads.php');
        exit(0);
    }

}