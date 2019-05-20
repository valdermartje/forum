<?php
    // session engine
    session_start();
    include_once('../helpers/db.php');

    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        header('Location: ../../index.php');
        die();
    }

    // hier de data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $password = $_POST['password'];

    /*eerst connectie(met db)
    verplicht try catch*/
    if(dbConnect()) {
        // query samenstellen
        dbQuery(
            "SELECT username, bio, email FROM users 
                WHERE users = :gebruikersnaam
                OR email = :emailadres", 
            [':gebruikersnaam' => $username,
             ':emailadres' => $email]
        );

        //controleren of die al bestaat ||met de rowcount telt hij het
        // $found_user = $db_query->fetch(PDO::FETCH_ASSOC);
        // // echo empty($found_user);
        // echo (dbCount() == 0 ? 'Gevonden' : 'Leeg');
        // die();
           
        if(dbCount() > 0){
            /* hier wordt eerst getoond dat de gebruiker een fout heeft.
                dus eerst tonen */ 
            $_SESSION['error'] = 'Gebruiker en/of email bestaat al!';
            header('Location: ../../registreren.php');
            exit(0);//hier wordt de code gestopt, anders gaat hij verder
        }

        /*hier bestaat de user niet
        daarna breng ik de user naar de login page*/
        //$password = password_hash($password, PASSWORD_DEFAULT);//een hash password
        dbQuery(
            "INSERT INTO users(username, email, bio, password) VALUES(:gebruikersnaam, :email, :bio, :password)",
            [
                ':gebruikersnaam'=> $username,
                ':email' => $email,
                ':bio' => $bio,
                ':password' => password_hash($password, PASSWORD_DEFAULT) //de gehashte password
            ]
        );

        // hier wordt getoond als de result niet goed en/of niet bestaat dit uitvoeren
        $_SESSION['success'] = 'Uw account is succesvol aangemaakt';
        header('Location: ../../registreren.php');
        exit(0);
    }