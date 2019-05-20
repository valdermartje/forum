<?php
include_once('app/helpers/db.php');

if(dbConnect()){
    dbQuery("SELECT threads.*, 
                users.username
                FROM threads 
                INNER JOIN users ON threads.users_id = users.id");
    
    $threads = dbGetAll();//alle informatie
}

// BEGIN ALERT
if(isset($_SESSION['error_profile'])): ?>
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
<!-- EINDE ALERT -->

<div class="container">
    <div class="row">
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
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="page-header">
            <h1>Threads</h1>
        </div>
        
        <!-- BEGIN THREADS -->
        <div class="col-sm-12 mt-2">
            <?php foreach($threads as $thread): ?><!-- nu kan ik alle informatie gebruiken in html-->
                <a href="topic.php?id=<?= $thread['id'] ?>">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"><?= $thread['title']?></h3>
                            <div class="row">
                                <div class="col-sm-4">
                                    <img class="" src="img/bg2.jpg" width="250px" height="auto" alt="failed loading...">
                                </div>
                                <div class="col-sm-8">
                                    <p class="card-text text-left">
                                        <?= $thread['content'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="rechts text-right">
                                <p class="deleteTopic" style="display: none; color: red;">Delete <span
                                        class="fas fa-trash-alt"></span></p>
                                <p class="actor text-right" id="actor">
                                    Acteur: <?= $thread['username'] ?> <span class="fas fa-user"></span><br>
                                </p>
                                <p class="date text-right" id="date">
                                    Datum: <?= $thread['datum'] ?> <span class="far fa-calendar-alt"></><br>
                                </p>
                                <!-- <a href="reactions.php" class="reaction text-right" id="reaction">
                                    1 reactions <span class="fas fa-comments"></span><br>
                                </a> -->
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <!-- EINDE THREADS -->

    </div>

    </div>
</div>

<div class="margin-bottom">

</div>

<!-- INCLUDE FOOTER -->
<?php
if(isset($_SESSION['error_profile'])) {
    unset($_SESSION['error_profile']);
}