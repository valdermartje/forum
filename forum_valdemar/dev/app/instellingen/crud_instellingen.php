<?php
session_start();
include('connect.php');
  
// DIT IS VOOR HET UPDATEN VAN DE PROFIEL GEGEVENS || GEBRUIKERSNAAM, EMAIL EN BIO
if (isset($_POST['update_profile'])) {
    $id = $_SESSION['user_id'];
    $name = $_POST['gebruikersnaam'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];

    $stmt = $conn->prepare("UPDATE users SET username=:name, email=:mail, bio=:bio WHERE id=:id");

    // execute the query
    $stmt->execute([
        ':name' => $name,
        ':mail' => $email,
        ':bio' => $bio,
        ':id' => $id
    ]);

    $_SESSION['success'] = 'Uw gegevens zijn geupdate, U moet alleen opnieuw inloggen';
    header("location: ../../profile.php");
    exit(0);
}

// DIT IS VOOR HET UPDATEN VAN DE WACHTWOORD
// EERSTE OUDE PASSWORD INVOEREN VOORDAT JE DE NIEUWE PASSWORD WILT INVOEREN
$old_password = $_POST["old_password"];
$password = password_verify($old_password , $user['password']);

if(isset($_POST['update_password'])){
    $id = $_SESSION['user_id'];  
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password']; 

    if(strlen($password) >= 8){
        if($password == $confirm_password){

            $new_password = password_hash($password, PASSWORD_DEFAULT);
    
            $stmt = $conn->prepare("UPDATE users SET password = :new_password WHERE id=:id");
            $stmt->execute([
                ':new_password' => $new_password,
                ':id' => $id
            ]);
    
            $_SESSION['success'] = 'Wachtwoord is bijgewerkt!';
            header('Location: ../../profile.php');
            exit(0);
        }
    } else {
        $_SESSION['failed'] = 'Er is iets misgegaan!';
        header('Location: ../../profile.php');
        exit(0);
    }
}

// DIT IS VOOR HET UPDATEN VAN DE PROFIELFOTO
if(isset($_POST['upload_photo'])){
    // $profielfoto = $_POST['profielfoto_upload'];

    $imagefileHandle = fopen($_FILES['profielfoto_upload']['tmp_name'], 'rb');
    $imageData = fread($imagefileHandle, filesize($_FILES['profielfoto_upload']['tmp_name']));
    fclose($imagefileHandle);
    
    $query = $conn->prepare('UPDATE users SET profielfoto = :pf WHERE id = :id');
    $query->execute([
        ':pf' => $imageData,
        ':id' => $_SESSION['user_id']
    ]);
    
    $_SESSION['success'] = 'Uw gegevens zijn geupdate, U moet alleen opnieuw inloggen';
    header("Location: ../../profile.php");
    exit(0);
} 
