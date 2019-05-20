<?php
$dbhost = '127.0.0.1';
$db = 'forum';
$user = 'root';
$password = '';

try{
    // connectie
    $conn = new PDO("mysql:host=$dbhost;dbname=$db", $user, $password);

    $db_statement = $conn->prepare('SELECT id, username, email FROM users');//prepare zorgt ervoor dat hij het weet
    
    //hier wordt het uitgevoerd
    $db_statement->execute();
    
    //hier alle data
    $gebruikers = $db_statement->fetchAll(PDO::FETCH_ASSOC);//fetch all dan geef je ze allemaal 

}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
    die();
}