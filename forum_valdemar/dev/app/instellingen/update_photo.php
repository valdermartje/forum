<?php
// session engine
session_start();
include_once('connect.php');

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('Location: ../../index.php');
    die();
}

// hier de data
$pf = $_POST['profielfoto_update'];
$id = $_SESSION['user_id'];

header("location: ../../profile.php");