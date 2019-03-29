<!-- INCLUDE HEADER -->
<?php
    session_start();    
    include_once('app/templates/bovenstuk.php');
    
    // $_SESSION['error_profile'];
    
?>
<!-- EINDE HEADER -->

<!-- CONTENT -->
<?php if(isset($_SESSION['error_profile'])): ?>
    <div class="container">
        <div class="row"> 
            <div class="col-md-12 offset-md-12">
                <div class="alert alert-danger text-left pl-5" role="alert">
                    <?= $_SESSION['error_profile'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<div class="container">
    <div class="page-header">
        <h1>Home</h1>
    </div>
<p>
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam, in quod doloribus voluptate deserunt soluta quos dolorem illo iure rem? Ipsum, id quisquam. Recusandae dolore ipsam, pariatur quod et provident?
    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet quas nisi eligendi magnam, cum quis ratione eos iure autem. Praesentium quas labore, quaerat autem accusantium illo facilis cumque sunt blanditiis.
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam eos minima explicabo earum quidem, cum velit iste excepturi facilis sapiente, similique reiciendis dolores, modi dolorum fugit soluta harum magni nesciunt!
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minus eius maxime rem illum nisi sed aliquam veritatis nesciunt, sequi facilis enim, consequuntur ipsa. Obcaecati voluptate cupiditate eaque magnam eveniet.
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error maiores ea unde eveniet sint molestiae, adipisci nihil nisi fugiat quaerat corrupti at? Cumque debitis corrupti eos, facilis alias beatae sapiente.
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique labore repudiandae eveniet repellendus commodi, aliquam totam enim, iste dolorum velit earum sint. Dolor repudiandae inventore suscipit nulla, doloremque in praesentium.
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, rerum dolorum consequuntur cupiditate culpa reprehenderit delectus nihil illo facere accusantium neque, impedit beatae autem consectetur. Iusto, omnis aliquid. Iste, consequuntur!
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto et nulla aspernatur dicta maiores, quam necessitatibus quos iste commodi dolorum! Illum odio laborum eveniet dolorum consectetur unde ducimus, excepturi reiciendis.
    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati eum esse vel tempora libero dolore qui illo quasi vero illum, corrupti, odio voluptatibus. Explicabo officia natus, voluptatum harum possimus vel.
</p>
<div class="page-header">
    <h1 class="">Threads</h1>
</div>
<div class="row first-row last-row">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
        <!-- <img class="card-img-top" src="img/slot.png" alt="Card image cap"> -->
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="threads.php" class="card-link">Thread link</a>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
        <!-- <img class="card-img-top" src="img/slot.png" alt="Card image cap"> -->
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="threads.php" class="card-link">Thread link</a>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
        <!-- <img class="card-img-top" src="img/slot.png" alt="Card image cap"> -->
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="threads.php" class="card-link">Thread link</a>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
        <!-- <img class="card-img-top" src="img/slot.png" alt="Card image cap"> -->
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="threads.php" class="card-link">Thread link</a>
            </div>
        </div>
    </div>

    <div class="margin-bottom">
    
    </div>

</div>

</div>
<!-- EINDE CONTENT -->

<!-- INCLUDE FOOTER -->
<?php
if(isset($_SESSION['error_profile'])) {
    unset($_SESSION['error_profile']);
}
include_once('app/templates/onderstuk.php');