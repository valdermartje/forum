<!-- HIER LAAT IK DE GEBRUIKERS TONEN -->
<div class="container">
  <div class="row">
          <br>
          <div class="col-xs-12 text-left">
              <div class="previous" id="previous" onclick="previousSettings()" onmouseover="mouseover()"
                  onmouseout="mouseout()"><span class="fas fa-angle-double-left"></span> Previous</div>
          </div>
          <br>
      </div>
      <hr>
  <table class="table table-striped">
  <thead>
    <tr>
    
    <?php
        include_once('connect.php');
        // include_once('../helpers/db.php');

        $kolommen = array_keys($gebruikers[0]);

        foreach ($kolommen as $kolom) {
            echo "<th class='tablehead'> $kolom </th>";
        }
    ?>
      <th scope="col" class="tablehead">Delete</a></th>
      <th scope="col" class="tablehead">Update</a></th>
      <th scope="col"><a class="add-user" href="addgebruiker.php">Add</a></th>
    </tr>
  </thead>
    
    <?php
        $stmt = $conn->prepare("SELECT * FROM users");
        $stmt->execute();
        $data = $stmt->fetchAll();

        foreach ($data as $k => $v):
    ?>
  
  <tbody>
    <tr>
      <th scope="row"><?= $v ['id'] ?></th>
      <td><?= $v ['username']  ?></td>
      <td><?= $v ['email']  ?></td>
        <form action="app/gebruikers/crud.php?id=<?= $v['id']; ?>" method="POST">
            <td>
                <button class="btn btn-danger" name="delete">Delete</button>
            </td>
        </form>
        <form action="updategebruiker.php?id=<?= $v['id']; ?>" method="POST">
        <!-- app/gebruikers/ -->
            <td>
                <button class="btn btn-primary" name="update">Update</button>
            </td>
        </form>
    </tr>
  </tbody>

  <?php endforeach; ?>
  </table>
  </div>

  <div class="margin-bottom">

  </div>