<?php
session_start();
?>

<div id="registreren">
<!-- BEGIN ERROR -->
    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert-box alert-error">
            <p class="alert-error-title">ERROR</p>
            <p class="alert-box-message">
                <?= $_SESSION['error']; ?>
            </p>
        </div>
        <!-- TODO: geschikt voor refactoring -->
        <?php unset($_SESSION['error']) ?>
    <?php endif; ?>
<!-- EINDE ERROR -->

<!-- BEGIN SUCCES -->
    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert-box alert-success">
            <p class="alert-succes-title">SUCCESS</p>
            <p class="alert-box-message">
                <?= $_SESSION['success']; ?>
            </p>
        </div>
        <!-- TODO: geschikt voor refactoring -->
        <?php unset($_SESSION['success']) ?>
    <?php endif; ?>
<!-- EINDE SUCCES -->
        
        <h1 class="whiteh1">Registreren</h1>
        <form class="col s12" method="post" action="app/register/registration.php" name="registreren">
            <label class="margin-top">Gebruiksnaam:</label>
            <input class="text" type="text" name="username" placeholder="Gebruikersnaam" required><br>
            <label>Email:</label>
            <input class="text" type="email" name="email" placeholder="someone@gmail.com" required><br>
            <label>Wachtwoord</label>
            <input class="text" type="password" name="password" placeholder="Wachtwoord" required><br>
            <label>Wachtwoord herhalen</label>
            <input class="text" type="password" name="password_repeat" placeholder="Wachtwoord herhalen" required><br>
            <label>Biografie:</label>
            <input class="uploadText" type="text" name="bio" placeholder="Geef hier uw bio aan!" required>
            12 + 6 = <input type="text" name="getal" class="getal">
<!--            --><?//= rand(1, 10) ?><!-- + --><?//= rand(1, 10) ?>
            <input type="submit" class="button btn btn-primary" name="loginSubmit" value="Registreren">
        </form>
    </div>

    <div class="margin-bottom">

    </div>

<?php
session_destroy();