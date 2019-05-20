<?php
session_start();
include('connect.php');
include_once('../helpers/db.php');
   
if (isset($_POST["delete"])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id= $id";
    $conn->exec("$sql");
    header("location: ../../gebruikers.php");
}

if (isset($_POST['add'])) {
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        header('Location: ../../profile.php');
        die();
    }

    $username = $_POST['username'];
    $profielfoto = $_POST['profielfoto'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $password = $_POST['password'];

    if(dbConnect()) {
        dbQuery(
            "SELECT username, profielfoto, bio, email FROM users 
                WHERE users = :gebruikersnaam
                OR email = :emailadres", 
            [':gebruikersnaam' => $username,
             ':emailadres' => $email]
        );
           
        if(dbCount() > 0){ 
            $_SESSION['error'] = 'Gebruiker en/of email bestaat al!';
            header('Location: ../../profile.php');
            exit(0);//hier wordt de code gestopt, anders gaat hij verder
        }

        dbQuery(
            "INSERT INTO users(username, profielfoto, email, bio, password) VALUES (:gebruikersnaam, :profielfoto, :email, :bio, :password)",
            [
                ':gebruikersnaam'=> $username,
                ':profielfoto' => $profielfoto,
                ':email' => $email,
                ':bio' => $bio,
                ':password' => password_hash($password, PASSWORD_DEFAULT) //de gehashte password
            ]
        );

        // hier wordt getoond als de result niet goed en/of niet bestaat dit uitvoeren
        $_SESSION['success'] = 'Account is succesvol aangemaakt';
        header('Location: ../../profile.php');
        exit(0);
    }
}
    
if (isset($_POST['update'])) {
    $id = $_SESSION["id"];
    $name = $_POST['gebruikersnaam'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];

    $stmt = $conn->prepare("UPDATE users SET username='$name', email='$email', bio='$bio' WHERE id=$id");

    // execute the query
    $stmt->execute();

    header("location: ../../gebruikers.php");
}