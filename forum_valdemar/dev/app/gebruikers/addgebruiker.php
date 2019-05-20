<?php 
include_once('connect.php');
?>
<body>
    <form action="app/gebruikers/crud.php" method="post">
        <div class="container">
                <div class="row">
                    <div class="col">
                        <label for="gebruikersnaam">Gebruikersnaam</label>
                        <input type="text" name="username" id="gebruikersnaam" class="form-control" placeholder="Gebruikersnaam">
                    </div>
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="col">
                        <label for="password">Wachtwoord</label>
                        <input type="password" name="password" id="wachtwoord" class="form-control" placeholder="Wachtwoord">
                    </div>
                    <div class="col">
                        <label for="password">Bio</label>
                        <input type="text" name="bio" id="bio" class="form-control" placeholder="Bio">
                    </div>
                    <button type="submit" name="add" id="add" class="btn btn-primary float-left">Add</button>
                </div>
            </div>
    </form>
</body>
</html>
