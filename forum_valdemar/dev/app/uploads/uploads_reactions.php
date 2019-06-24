<?php
session_start();
include_once('../helpers/db.php');

if(!$_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: ../../reactions.php?id=' . $_SESSION['topic_id']);
    exit(0);
}

if(isset($_POST['add_reaction'])){
    $reaction = $_POST['reaction'];    
    


    // deze data wordt gestuurd naar de database
    if(dbConnect()) {
            
        dbQuery(
            "INSERT INTO reactions(reaction, datum, user_id, topic_id, thread_id) VALUES (:reactie, :datum, :id, :topic_id, :thread_id)",
            [
                ':reactie' => $reaction,
                // ':profielfoto_user' => $_SESSION['profielfoto'], 
                ':datum' => date("d-m-Y H:i:s", time()),
                ':id' =>  $_SESSION['user_id'],
                ':topic_id' => $_SESSION['topic_id'],
                ':thread_id' => $_SESSION['thread_id']
            ]
        );

        // $_SESSION['success'] = 'Topic is aangemaakt!!';
        header('Location: ../../reactions.php?id=' . $_SESSION['topic_id']);
        exit(0);
    }

}