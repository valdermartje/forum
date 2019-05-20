<?php
session_start();

include_once('../helpers/db.php');
include_once('../functions.php');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $wachtwoord = $_POST['password'];

    if(dbConnect()) {                                                                                               //connectie

        dbQuery( "SELECT id, username, profielfoto, bio, email, password, role
        FROM users 
        WHERE email = :email", [':email' => $email]
        );//query samenstellen

        if(dbCount() == 0) {                                                                                        //foutmelding
            // User bestaat niet, dus we kunnen niet inloggen
            $_SESSION['error_inloggen'] = 'Gebruiker niet gevonden! Aanmelden kan op de pagina registreren';
            header('Location: ../../login.php');
            exit(0);
        }

        $user = dbGet();                                                                                            //dan met al zijn colummen

        if(password_verify($wachtwoord, $user['password'])) {                                                       //dan kijken met de password
            // Gebruiker bestaat al
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['password'] = $user['password'];
            $_SESSION['profielfoto'] = getProfilePicture($user['profielfoto']);
            $_SESSION['bio'] = $user['bio'];
            $_SESSION['admin'] = ($user['role'] == 1 ? true : false);                                           //als hij een role 1 heeft dan een true
            header('Location: ../../profile.php');
            // $_SESSION['success_inloggen'] = 'U bent correct ingelogd';
            exit(0);//invoegen als je een header hebt, want wij willen dan dat onze code niet verder gaat
        } else {
            //nier goed ingevoerd dan gaan wij naar de login pagina
            // User bestaat niet, dus we kunnen niet inloggen
            $_SESSION['error_inloggen'] = 'Email en/of wachtwoord combinatie is fout!';
            header('Location: ../../login.php');
            exit(0);
        }
    }
}

// dit is voor de profielfoto, want als er niks is opgeslagen dan wordt een standaard fptp ingezet
function getProfilePicture($data)
{
    if(!is_null($data) && !empty($data)) {
        return $data;
    }

    $imgHandle = fopen('../../img/pf2.jpg', 'rb');
    $imgdata = fread($imgHandle, filesize('../../img/pf2.jpg'));
    fclose($imgHandle);

    return $imgData;
}