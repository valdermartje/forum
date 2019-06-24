<?php
if(!isset($_SESSION['username'])) {
    // $_SESSION['error'] = 'U moet eerst inloggen om toegang te krijgen!';
    $_SESSION['error_profile'] = "U was niet bevoegd om deze pagina te weergeven";
    header('Location: index.php');
    exit(0);
}
include_once('app/instellingen/connect.php');
?>

<!-- BEGIN VERWIJZING -->
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
<!-- EINDE VERWIJZING -->

<!-- BEGIN UPDATE PHOTO -->
    <form action="app/instellingen/crud_instellingen.php" enctype="multipart/form-data" method="post">
        <div class="form-group row">
            <div class="col-sm-12">
                <input type="file" name="profielfoto_upload" class="form-control" ><!--accept="image/png,image/gif,image/jpeg,image/jpg"-->
            </div>
        </div>  
        <div class="form-group row text-center">
            <div class="col-sm-12">
                <button type="submit" name="upload_photo" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </form>
<!-- EINDE UPDATE PHOTO -->


<div class="margin-bottom-reaction">

</div>
