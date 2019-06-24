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
    $password_repeat = $_POST['password_repeat'];
    $getal = $_POST['getal'];


    // HIER WORDT GEKEKEN 0F DE GETAL DIE JE MOET INVULLEN 18 IS EN DAN KAN JE JE REGISTREREN
    if($getal == 18){

        if($password == $password_repeat){// hier check ik of de wachtwoorden aanelkaar gelijk zijn

            if(dbConnect()) {
                dbQuery(
                    "SELECT username, bio, email FROM users 
                        WHERE users = :gebruikersnaam
                        OR email = :emailadres", 
                    [':gebruikersnaam' => $username,
                    ':emailadres' => $email]
                );
                
                if(dbCount() > 0){
                    $_SESSION['error'] = 'Gebruiker en/of email bestaat al!';
                    header('Location: ../../registreren.php');
                    exit(0);
                }

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

        } else {

        $_SESSION['error'] = "Uw wachtwoorden zijn niet gelijk";
        header('Location: ../../registreren.php');
        exit(0);

    }

    } else {

        $_SESSION['error'] = "Bent u een robot?";
        header('Location: ../../registreren.php');
        exit(0);

    }