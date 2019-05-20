<?php
// helpers_functions.php

function isLoggedIn(){
    return isset($_SESSION['user_id']);
}

function isNotLoggedIn(){
    return !isLoggedIn();
}

function isAdmin(){
    return isLoggedIn() && $_SESSION['admin'];    
}