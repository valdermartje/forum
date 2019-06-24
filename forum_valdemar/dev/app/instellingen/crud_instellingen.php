<?php
session_start();
include_once('../helpers/db.php');
include('connect.php');

if(!$_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: ../../profile.php');
    exit(0);
}

// DIT IS VOOR HET UPDATEN VAN DE PROFIEL GEGEVENS || GEBRUIKERSNAAM, EMAIL EN BIO
if (isset($_POST['update_profile'])) {
    $id = $_SESSION['user_id'];
    $name = $_POST['gebruikersnaam'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];

    if(dbConnect()){
        dbQuery("UPDATE users 
                 SET username= :name, 
                 email= :mail, 
                 bio= :bio 
                 WHERE id= :id", [
                     ':name' => $name,
                     ':mail' => $email,
                     ':bio' => $bio,
                     ':id' => $id
                 ]);
    
        $_SESSION['success'] = 'Uw gegevens zijn geupdate, U moet alleen opnieuw inloggen';
        header("location: ../../profile.php");
        exit(0);
    }
}

// DIT IS VOOR HET UPDATEN VAN DE WACHTWOORD
// EERSTE OUDE PASSWORD INVOEREN VOORDAT JE DE NIEUWE PASSWORD WILT INVOEREN

if(isset($_POST['update_password'])){
    
    $old_password = $_POST["old_password"];
    // $check_password = password_verify($old_password , $user['password']);

    $id = $_SESSION['user_id'];  
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password']; 

    if(dbConnect()){
        if(password_verify($old_password , $_SESSION['password'])){
            
            if(strlen($password) >= 8){
                if($password == $confirm_password){
        
                    $new_password = password_hash($password, PASSWORD_DEFAULT);
            
                    dbQuery("UPDATE users 
                             SET password = :new_password 
                             WHERE id= :id", [
                                ':new_password' => $new_password,
                                ':id' => $id
                             ]);

                    $_SESSION['success'] = 'Wachtwoord is bijgewerkt!';
                    header('Location: ../../profile.php');
                    exit(0);

                } else {

                    $_SESSION['failed'] = 'Wachtwoord zijn niet gelijk aan elkaar!';
                    header('Location: ../../profile.php');
                    exit(0);

                }
            } else {

                $_SESSION['failed'] = 'Wachtwoord is niet langer dan 8 tekens!';
                header('Location: ../../profile.php');
                exit(0);

            }
            
        } else {
    
            $_SESSION['failed'] = 'Wijzigen van uw wachtwoord is mislukt!';
            header('Location: ../../profile.php');
            exit(0);
    
        }
    }
}

// DIT IS VOOR HET UPDATEN VAN DE PROFIELFOTO
if(isset($_POST['upload_photo'])){

    $imagefileHandle = fopen($_FILES['profielfoto_upload']['tmp_name'], 'rb');
    $imageData = fread($imagefileHandle, filesize($_FILES['profielfoto_upload']['tmp_name']));
    fclose($imagefileHandle);
    
    if(dbConnect()){
        dbQuery('UPDATE users 
                 SET profielfoto = :pf 
                 WHERE id = :id', [
            ':pf' => $imageData,
            ':id' => $_SESSION['user_id']
        ]);
        
        $_SESSION['success'] = 'Uw gegevens zijn geupdate, U moet alleen opnieuw inloggen';
        header("Location: ../../profile.php");
        exit(0);
    }

} 


// HIER GA IK ALLES VERWIJDEREN VAN DE UPLOADS, ZOALS REACTIES EN TOPICS ETC..
if(isset($_POST['delete_reaction'])){
    $id = $_GET['id'];

    if(dbConnect()){
        dbQuery('DELETE FROM reactions WHERE id = :id', [
            ':id' => $id
        ]);

        $_SESSION['success'] = 'Uw reactie is verwijderd';
        header("Location: ../../profile.php");
        exit(0);

    } else {

        $_SESSION['failed'] = 'Uw reactie is niet verwijderd, probeer het opnieuw!';
        header("Location: ../../profile.php");
        exit(0);

    }

}

if(isset($_POST['delete_topic'])){
    $id = $_GET['id'];

    if(dbConnect()){
        // dbQuery('DELETE FROM topic WHERE id = :id', [
        //     ':id' => $id
        // ]);

        dbQuery(
            "DELETE FROM reactions WHERE topic_id IN (SELECT topic_id FROM topic WHERE topic_id = :id);
                  DELETE FROM topic WHERE id = :id; ", [
                 ':id' => $id
                 ]);

        $_SESSION['success'] = 'Uw Topic is verwijderd';
        header("Location: ../../profile.php");
        exit(0);

    } else {

        $_SESSION['failed'] = 'Uw topic is niet verwijderd, probeer het opnieuw!';
        header("Location: ../../profile.php");
        exit(0);

    }

}

if(isset($_POST['delete_thread'])){
    $id = $_GET['id'];

    if(dbConnect()){
        dbQuery(
            "DELETE FROM reactions WHERE topic_id IN (SELECT topic_id FROM topic WHERE thread_id = :thread_id);
    
                  DELETE FROM topic WHERE thread_id = :thread_id;
                  DELETE FROM threads WHERE id = :thread_id; ", [
                 ':thread_id' => $_GET['id']
                 ]);

        $_SESSION['success'] = 'Uw Thread is verwijderd';
        header("Location: ../../profile.php");
        exit(0);

    } else {

        $_SESSION['failed'] = 'Uw Thread is niet verwijderd, probeer het opnieuw!';
        header("Location: ../../profile.php");
        exit(0);

    }

}


// HIER GA IK ZE ALLEMAAL UPDATEN, DUS DAN KAN IK DE REACTIES EN TOPICS UPDATEN
if(isset($_POST['update_reaction'])){

    $id = $_GET['id'];
    $reaction = $_POST['reaction']; 

    if(dbConnect()){
        dbQuery(
            "UPDATE reactions 
             SET reaction = :reaction
             WHERE id = :id", [
                 ':reaction' => $reaction,
                 ':id' => $id
        ]);

        $_SESSION['success'] = 'Uw reactie is geüpdate';
        header("Location: ../../profile.php");
        exit(0);

    } else {

        $_SESSION['failed'] = 'Uw reactie is niet geüpdate, probeer het opnieuw!';
        header("Location: ../../profile.php");
        exit(0);

    }
}


// UPDATE TOPIC
if(isset($_POST['update_topic'])){

    $id = $_GET['id'];
    $titel = $_POST['title_topic'];
    $reaction = $_POST['content_topic']; 

    if(dbConnect()){
        dbQuery(
            "UPDATE topic 
             SET titel = :titel,
             content = :reaction
             WHERE id = :id", [
                 ':titel' => $titel,
                 ':reaction' => $reaction,
                 ':id' => $id
        ]);

        $_SESSION['success'] = 'Uw reactie is geüpdate';
        header("Location: ../../profile.php");
        exit(0);

    } else {

        $_SESSION['failed'] = 'Uw reactie is niet geüpdate, probeer het opnieuw!';
        header("Location: ../../profile.php");
        exit(0);

    }

}

// UPDATE TOPIC
if(isset($_POST['update_thread'])){

    $id = $_GET['id'];
    $titel = $_POST['title_thread'];
    $content = $_POST['content_thread']; 

    if(dbConnect()){
        dbQuery(
            "UPDATE threads 
             SET title = :titel,
             content = :reaction
             WHERE id = :id", [
                 ':titel' => $titel,
                 ':reaction' => $content,
                 ':id' => $id
        ]);

        $_SESSION['success'] = 'Uw reactie is geüpdate';
        header("Location: ../../profile.php");
        exit(0);

    } else {

        $_SESSION['failed'] = 'Uw reactie is niet geüpdate, probeer het opnieuw!';
        header("Location: ../../profile.php");
        exit(0);

    }

}