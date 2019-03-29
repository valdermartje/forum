<!-- logout -->
<?php
session_start();

if(isset($_SESSION['user_id']))
    unset($_SESSION['user_id']);

if(isset($_SESSION['users']))
    unset($_SESSION['users']);

if(isset($_SESSION['error']))
    unset($_SESSION['error']);

session_destroy();

header('Location: index.php');
exit(0);