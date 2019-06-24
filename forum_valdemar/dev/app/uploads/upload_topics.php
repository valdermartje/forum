<?php
session_start();
include_once('../helpers/db.php');

if(!$_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: ../../topic.php?id=' . $_SESSION['thread_id']);
    exit(0);
}

if(isset($_POST['add_topic'])){
    $title = $_POST['titel'];
    $content = $_POST['content'];

//    DIT IS VOOR DE FOTO VAN DE TOPIC
    $imagefileHandle = fopen($_FILES['photo']['tmp_name'], 'rb');
    $imageData = fread($imagefileHandle, filesize($_FILES['photo']['tmp_name']));
    fclose($imagefileHandle);
    
    // hier wordt data naar de database gestuurd
    if(dbConnect()) {
            
        dbQuery(
            "INSERT INTO topic(titel, content, foto_topic, datum, user_id, thread_id) VALUES (:titel, :content, :foto, :datum, :id, :thread_id)",
            [
                ':titel'=> $title,
                ':content' => $content,
                ':foto' => $imageData,
                ':datum' => date("d-m-Y H:i:s", time()),
                ':id' =>  $_SESSION['user_id'],
                ':thread_id' => $_GET['id']  
            ]
        );
        
        header('Location: ../../topic.php?id=' . $_SESSION['thread_id']);
        exit(0);
    }

}
