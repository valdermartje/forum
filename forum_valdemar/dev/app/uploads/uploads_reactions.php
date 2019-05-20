<?php
session_start();
include_once('../helpers/db.php');

if(isset($_POST['add_reaction'])){
    $reaction = $_POST['reaction'];    
    
    if(dbConnect()) {
        dbQuery(
            "SELECT * FROM reactions 
                WHERE reaction = :reactie",
            [':reactie' => $reactie]
        );
            
        dbQuery(
            "INSERT INTO reactions(reaction, datum, user_id) VALUES (:reactie, :datum, :id)",
            [
                ':reactie'=> $reaction,
                ':datum' => date("d-m-Y H:i:s", time()),
                ':id' =>  $_SESSION['user_id']  
            ]
        );

        // $_SESSION['success'] = 'Topic is aangemaakt!!';
        header('Location: ../../reactions.php');
        exit(0);
    }

}