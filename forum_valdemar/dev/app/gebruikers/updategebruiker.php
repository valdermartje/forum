<?php 
include_once('connect.php');
    $id = $_GET['id'];

    $_SESSION["id"] = "$id";

    $stmt = $conn->prepare("SELECT id, username, email,  bio FROM users WHERE id = $id");
    
    $stmt->execute();
    $data = $stmt->fetchAll();

    foreach ($data as $k => $v): ;


?>
  <form action="app/gebruikers/crud.php" method="post">
      <div class="container">
            <div class="row">
                <div class="col">
                    <label for="gebruikersnaam">Gebruikersnaam</label>
                    <input type="text" name="gebruikersnaam" id="gebruikersnaam" class="form-control" value="<?= $v ['username']  ?>">
                </div>
                <div class="col">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email text-black" value="<?= $v ['email']  ?>">
                </div>
                <div class="col">
                    <label for="bio">Bio</label>
                    <input type="text" name="bio" id="bio" class="form-control"" value="<?= $v ['bio']  ?>">
                </div>
            </div>
            <br>
            <button type="submit" name="update" id="update" class="btn btn-primary">Update</button>
        </div>
</form>
<?php endforeach; ?>

</body>
</html>
