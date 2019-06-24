<?php
session_start();
include_once('../helpers/db.php');
include_once('../helpers/helpers_functions.php');

if($_SERVER['REQUEST_METHOD'] != 'POST' && isset($_POST['thread_id'])) {
    header('Location: ../../threads.php');
    exit(0);
}

if(dbConnect()){

    // als de POST van verwijderen_thread wordt geklikt wordt de thread met de bijhorende topics en reacties verwijderd
    if(isset($_POST['verwijderen_thread'])){
        dbQuery(
        "DELETE FROM reactions WHERE topic_id IN (SELECT topic_id FROM topic WHERE thread_id = :thread_id);

              DELETE FROM topic WHERE thread_id = :thread_id;
              DELETE FROM threads WHERE id = :thread_id; ", [
             ':thread_id' => $_POST['thread_id']
             ]);

        header('location: ../../threads.php');
    }

    // als de POST van verwijderen_topic wordt geklikt wordt de topic met de bijhorende reacties verwijderd
    if(isset($_POST['verwijderen_topic'])){
        dbQuery(
            "DELETE FROM topic 
             WHERE id = :topic_id;
             DELETE FROM reactions WHERE topic_id = :topic_id;", [
             ':topic_id' => $_GET['id']
             ]);

        header('Location: ../../topic.php?id=' . $_SESSION['thread_id']);
    }

    // als de POST van verwijderen_reactie wordt geklikt wordt de reactie verwijderd
    if(isset($_POST['verwijderen_reactie'])){
        dbQuery(
            "DELETE FROM reactions
             WHERE id = :reactie_id", [
             ':reactie_id' =>  $_GET['id']
             ]);

        header('location: ../../reactions.php?id=' .  $_SESSION['topic_id']);
    }
}
