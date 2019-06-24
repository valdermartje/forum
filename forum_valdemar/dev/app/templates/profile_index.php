<?php
if(!isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
    // $_SESSION['error'] = 'U moet eerst inloggen om toegang te krijgen!';
    $_SESSION['error_profile'] = "U was niet bevoegd om deze pagina te weergeven";
    header('Location: index.php');
    exit(0);
}
?>

<!-- BEGIN FAILED MELDING -->
<?php if(isset($_SESSION['failed'])): ?>
    <div class="container">
        <div class="row"> 
            <div class="col-md-12 offset-md-12">
                <div class="alert alert-danger text-left pl-5" role="alert">
                    <?= $_SESSION['failed'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- EINDE FAILED MELDING -->

<!-- BEGIN SUCCES MELDING -->
<?php if(isset($_SESSION['success'])): ?>
    <div class="container">
        <div class="row"> 
            <div class="col-md-12 offset-md-12">
                <div class="alert alert-success text-left pl-5" role="alert">
                    <?= $_SESSION['success'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- EINDE SUCCES MELDING -->

<!-- BEGIN PROFILE GEGEVENS -->
<div class="container">
    <div class="row">
        <br>
        <hr>
        <br>
        <!-- BEGIN PROFILE -->
        <div class="col-lg-12 text-center">
            <div class="profiel">
            <?php if(isset($_SESSION['profielfoto'])): ?>
                <img class="foto" src="data:image/jpg; base64, <?= base64_encode($_SESSION['profielfoto']) ?>" width="300px" height="300px" alt="photo">
            <?php endif; ?>

            <?php if(!isset($_SESSION['profielfoto'])): ?>
                <img class="foto" src="img/pf2.jpg" width="300px" height="300px" alt="photo">
            <?php endif; ?>
                
                <h1><?= $_SESSION['username'] ?></h1>
            </div>
        </div>
        
        <!-- alleen voor de admin -->
        <?php if(isAdmin()): ?>
        <a href="threads.php" id="thread" class="aAddThread btn btn-warning float-right margin-right" style="display: inline">Add thread</a>
        <?php endif; ?>
        <!-- einde -->

        <!-- BEGIN SETTINGS -->
        <?php if(isLoggedIn()): ?>
            <a href="instellingen.php" id="settings" class="settings btn btn-warning float-right margin-right" style="display: inline"><span class="fas fa-cog"></span></a>
        <?php endif; ?>
        <!-- EINDE SETTINGS -->
        
        <!-- BEGIN Gebruikers -->
        <?php if(isAdmin()): ?>
            <a href="gebruikers.php" id="gebruikers" class="settings btn btn-warning float-right margin-right" style="display: inline">Gebruikers <span class="fas fa-users"></span></a>
        <?php endif; ?>

        <?php if(isLoggedIn()): ?>
            <a href="overzicht_aangemaakt.php" id="overzicht" class="settings btn btn-warning float-right margin-right" style="display: inline">Overzicht <span class="fas fa-data"></span></a>
        <?php endif; ?>
        <!-- EINDE SETTINGS -->
        
        <br>
        <hr width="100%" size="4px">
        <br>

        <!-- BEGIN GEGEVENS VAN DE USER, DIR HAD IK IN HET BEGIN GEMAAKT. IK KON MAKELIJK MET EEN FOREACH ALLE DATA ERIN VULLEN-->
        <div class="col-sm-12 text-left margin-bottom">
            <!-- <hr>   -->
            <h1>Persoonlijke gegevens <span class="fas fa-lock"></span></h1>   
            Email: <?= $_SESSION['email'] ?> <br>
            Naam: <?= $_SESSION['username'] ?><br>
            Bio: <?= $_SESSION['bio'] ?>
            <?php

            if(is_null($_SESSION['bio']) || empty($_SESSION['bio'])) {
                echo "U heeft geen bio";
            }

            ?>
        </div>
        <!-- EINDE GEGEVENS -->
    </div>
    <hr>
<!-- EINDE PROFILE GEGEVENS -->

<?php
if(isset($_SESSION['success'])){
    unset($_SESSION['success']);
}

if(isset($_SESSION['failed'])){
    unset($_SESSION['failed']);
}