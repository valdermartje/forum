<?php
if(!isset($_SESSION['username'])) {
    // $_SESSION['error'] = 'U moet eerst inloggen om toegang te krijgen!';
    $_SESSION['error_profile'] = "U was niet bevoegd om deze pagina te weergeven";
    header('Location: index.php');
    exit(0);
}

// CONNECTIE DATABASE EN WE VERVANGEN HIER DE DATA
include_once('app/instellingen/connect.php');

$id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT id, username, email, bio FROM users WHERE id = $id");

$stmt->execute();
$data = $stmt->fetchAll();

?>
<!-- EINDE DATABASE -->

<!-- BEGIN ALERTS -->
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
<!-- EINDE ALERTS -->

<!-- HIER BEGINNEN WE MET DE CONTENT-->
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

<!-- BEGIN PROFILE INSTELLINGEN-->

<div class="row">
<!-- BEGIN PROFIELFOTO INSTELLINGEN -->
    <div class="col-md-12 text-center">
        <div class="profiel">
        <?php if(isset($_SESSION['profielfoto'])): ?>
            <img class="foto" src="data:image/jpg; base64, <?= base64_encode($_SESSION['profielfoto']) ?>" width="300px" height="300px" alt="photo">
        <?php endif; ?>

        <?php if(!isset($_SESSION['profielfoto'])): ?>
            <img class="foto" src="img/pf2.jpg" width="300px" height="300px" alt="photo">
        <?php endif; ?>
    </div>
    <div class="row">
        <a href="upload_photo.php" class="subject col-sm-12 col-form-label text-center">Change photo</a>
    </div>
<!-- EINDE PROFIELFOTO INSTELLINGEN -->

<!-- <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div> -->

  <!-- gegevens wijzigen -->
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Gebruikersgegevens wijzigen:
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
            <form action="app/instellingen/crud_instellingen.php" method="post">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-black">Gebruikersnaam</label>
                    <div class="col-sm-10">
                    <input type="text" name="gebruikersnaam" class="form-control" value="<?= $_SESSION['username'] ?>">
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="col-sm-2 col-form-label text-black">Email</label>
                    <div class="col-sm-10 ">
                    <input type="email" name="email" class="form-control text-black" value="<?= $_SESSION['email'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-black">Bio</label>
                    <div class="col-sm-10">
                    <input type="text" name="bio" class="form-control" value="<?= $_SESSION['bio'] ?>">
                    </div>
                </div>
                <div class="form-group row text-right">
                    <div class="col-sm-12">
                        <button type="submit" name="update_profile" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>


  <!-- voor wachtwoord wijzigen -->
  <div class="card margin-bottom">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Wachtwoord wijzigen:
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
            <form action="app/instellingen/crud_instellingen.php" method="post" class="">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-black">Wachtwoord</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" placeholder = "Voer uw nieuwe wachtwoord in(min. 8 tekens)">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-black">Wachtwoord(herhalen)</label>
                    <div class="col-sm-10">
                        <input type="password" name="confirm_password" class="form-control" placeholder="Herhaal het wachtwoord">
                    </div>
                </div>
                <div class="form-group row text-right">
                    <div class="col-sm-12">
                        <button type="submit" name="update_password" class="btn btn-primary">Change password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>