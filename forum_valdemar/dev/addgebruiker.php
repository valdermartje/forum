<?php 
session_start();
include_once('app/helpers/helper_functions.php');

if(!isLoggedIn()){
    $_SESSION['error_profile'] = "U was niet bevoegd om deze pagina te weergeven";
    header('Location: index.php');
    exit(0);
}

include_once('app/templates/bovenstuk.php');
include_once('app/gebruikers/addgebruiker.php');
include_once('app/templates/onderstuk.php');