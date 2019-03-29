<?php
session_start();

include_once('../functions.php');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "127.0.0.1";
    $databasename = "forum";
    $username = "root";
    $password = "";

    try {   
        // set the PDO error mode to exception
        if(isset($_POST['email'])){
            // alle variabelen van de formulier
            // $gebruikersnaam = $_POST['username'];
            $email = $_POST['email'];
            $wachtwoord = $_POST['password'];

            // de connectie
            $db_conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);

            // hier selecteren wij alles
            $query_gebruiker = $db_conn->prepare("SELECT id, users, email, password
                                                FROM forum_inhoud 
                                                WHERE email = :email");
                                                //   users = :gebruikersnaam AND

            // hier gaan wij de placeholders vervangen met de variabelen
            $query_gebruiker->execute(
                [
                    ':email' => $email
                ]
            );

            // hier als iets leeg is of niks heeft
            //if(is_null($result_query) || empty($result_query)){
            if($query_gebruiker->rowCount() === 0) {
                // User bestaat niet, dus we kunnen niet inloggen
                $_SESSION['error_inloggen'] = 'Email en/of wachtwoord combinatie is fout!';
                header('Location: ../../login.php');
                exit(0);
            //anders gaan wij de de else in 
            } else {
                // hier de wachtwoord als die goed ingevoerd is dan gaan wij naar de index pagina
                // hier alle variabelen stoppen in de $result_query
                $result_query = $query_gebruiker->fetch(PDO::FETCH_ASSOC);

                // dd($result_query);
                if(password_verify($wachtwoord, $result_query['password'])) {
                    // Gebruiker bestaat al
                    $_SESSION['user_id'] = $result_query['id'];
                    $_SESSION['username'] = $result_query['users'];
                    // $_SESSION['success_inloggen'] = 'U bent correct ingelogd';
                    header('Location: ../../profile.php');
                    exit(0);//invoegen als je een header hebt, want wij willen dan dat onze code niet verder gaat
                } else {
                    //nier goed ingevoerd dan gaan wij naar de login pagina
                    // User bestaat niet, dus we kunnen niet inloggen
                    $_SESSION['error_inloggen'] = 'Gebruiker niet gevonden!';
                    header('Location: ../../login.php');
                    exit(0);
                }
            }
        }
        
    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
}