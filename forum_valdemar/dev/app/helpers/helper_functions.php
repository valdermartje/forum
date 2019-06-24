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

function getProfileImage($img)
{
    $output = '';
    if(is_null($img) || empty($img)) {
        $output = "img/pf2.jpg";
    } else {
        $output = "data:image/jpg;base64, " . base64_encode($img);
    }

    return $output;
}

function getThreadImage($img)
{
    $output = '';
    if(is_null($img) || empty($img)) {
        $output = "img/thread.png";
    } else {
        $output = "data:image/png;base64, " . base64_encode($img);
    }

    return $output;
}

function getTopicImage($img)//, $img_type = 'jpg'
{
    $output = '';
    if(is_null($img) || empty($img)) {
        $output = "img/topic.jpg";
    } else {
//        $output = "data:image/' . $img_type . ';base64, " . base64_encode($img);
        $output = "data:image/png;base64, " . base64_encode($img);
    }

    return $output;
}