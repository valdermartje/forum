<?php 
include_once('connect.php');
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM reactions WHERE id = $id");
    $stmt->execute();
    $data = $stmt->fetchAll();

    // DEZE IS VOOR DE UPDATE VAN DE REACTIE
    foreach ($data as $k => $v):
        if(isset($_POST['update_reaction'])): ?>
        <form action="app/instellingen/crud_instellingen.php?id=<?= $_GET['id'] ?>" method="post">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <label for="gebruikersnaam">Reactie Updaten</label>
                        <input type="text" name="reaction" class="form-control" value="<?= $v ['reaction']  ?>">
                    </div>
                <button type="submit" name="update_reaction" class="btn btn-primary">Update</button>
            </div>
        </form>
        <?php endif;
    endforeach; ?>

<?php
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM topic WHERE id = $id");
    $stmt->execute();
    $data = $stmt->fetchAll();

    // DEZE IS VOOR DE UPDATE VAN DE TOPIC
    foreach ($data as $k => $v):
        if(isset($_POST['update_topic'])): ?>
            <form action="app/instellingen/crud_instellingen.php?id=<?= $_GET['id'] ?>" method="post">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <label for="gebruikersnaam">Topic Updaten</label><br>
                            Titel: <input type="text" name="title_topic" class="form-control" value="<?= $v ['titel']  ?>">
                            Content: <input type="text" name="content_topic" class="form-control" value="<?= $v ['content']  ?>">
                        </div>
                    <button type="submit" name="update_topic" class="btn btn-primary">Update</button>
                </div>
            </form>
        <?php endif;
    endforeach; ?>

<?php
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM threads WHERE id = $id");
    $stmt->execute();
    $data = $stmt->fetchAll();

    // DEZE IS VOOR DE UPDATE VAN DE THREAD
    foreach ($data as $k => $v):
        if(isset($_POST['update_thread'])): ?>
            <form action="app/instellingen/crud_instellingen.php?id=<?= $_GET['id'] ?>" method="post">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <label for="gebruikersnaam">Thread Updaten</label><br>
                            Titel: <input type="text" name="title_thread" class="form-control" value="<?= $v ['title']  ?>">
                            Content: <input type="text" name="content_thread" class="form-control" value="<?= $v ['content']  ?>">
                        </div>
                    <button type="submit" name="update_thread" class="btn btn-primary">Update</button>
                </div>
            </form>
        <?php endif;
    endforeach; ?>


