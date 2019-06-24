<?php
session_start();
?>

<div id="login">
    <!-- BEGIN ERROR -->
    <?php if(isset($_SESSION['error_inloggen'])): ?>
            <div class="alert-box alert-error">
                <p class="alert-error-title">ERROR</p>
                <p class="alert-box-message">
                    <?= $_SESSION['error_inloggen']; ?>
                </p>
            </div>
            <!-- TODO: geschikt voor refactoring -->
            <?php unset($_SESSION['error_inloggen']) ?>
        <?php endif; ?>
    <!-- EINDE ERROR -->
    
        <h1 class="whiteh1">Log In</h1>
        <form method="post" action="app/inloggen/inlogsysteem.php" name="login"><!-- Deze form wordt gestuurd met inhoud naar de inlogsysteem.php in het map inloggen -->
            <label>Email:</label>
            <input class="text" type="email" name="email" placeholder="someone@gmail.com" required><br>
            <label>Wachtwoord</label>
            <input class="text" type="password" name="password" placeholder="Wachtwoord" required><br>
            <input type="submit" class="button btn btn-primary" name="loginSubmit" value="Login">
        </form><br>

        <div class="text-center">
            <a class="alinks" href="registreren.php">Nog geen account?</a><br>
            <a class="alinks" href="mailto:valdermartje@gmail.com?subject=Wachtwoord vergeten">Wachtwoord
                vergeten?</a><br>
        </div>
    </div>

    <div class="margin-bottom-login">
    </div>

<div class="margin-bottom-login">
</div>

<?php
session_destroy();