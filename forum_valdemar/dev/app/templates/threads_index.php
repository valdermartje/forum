<?php
    include_once('app/helpers/db.php');

    if(dbConnect()){
        
        dbQuery("SELECT threads.*, 
                users.username
                FROM threads 
                INNER JOIN users ON threads.users_id = users.id");


        $threads = dbGetAll();

    }
?>

<!-- CONTENT -->
<div class="container">
    <div class="row">
        <!-- BEGIN SUCCES MELDING -->
        <?php if(isset($_SESSION['success'])): ?>
            <div class="container">
                <div class="row"> 
                    <div class="col-md-12 offset-md-12">
                        <div class="alert alert-success text-left pl-5" role="alert">
                            <?= $_SESSION['success'] ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- EINDE SUCCES MELDING -->
        
        <div class="page-header p-5">
            <h1>Threads</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 mt-2">
            <?php if(count($threads) > 0): ?><!-- ALS DE COUNT VAN THREADS HOGER IS DAN 0 DAN TOONT HIJ DE THREADS -->
                <?php foreach($threads as $thread): ?><!-- nu kan ik alle informatie gebruiken in de html-->
                    <form action="app/verwijderen_uploads/crud_verwijderen_uploads.php" method="post">
                        <a class="threads" href="topic.php?id=<?= $thread['id'] ?>">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title"><?= $thread['title']?></h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img class="foto_thread" src="<?= getThreadImage($thread['foto_thread']) ?>" alt="only png allowed">
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="card-text text-left">
                                                <?= $thread['content'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="rechts text-right">
                                        <p class="actor text-right" id="actor">
                                            Acteur: <?= $thread['username'] ?> <span class="fas fa-user"></span><br>
                                        </p>
                                        <p class="date text-right" id="date">
                                            Datum: <?= $thread['datum'] ?> <span class="far fa-calendar-alt"></><br>
                                        </p>
                                        <div class="">
                                            <?php if(isAdmin()): ?>
                                                <input type="hidden" name="thread_id" value="<?= $thread['id'] ?>" />
                                                <input type="submit" name="verwijderen_thread" class="btn btn-danger" value="Verwijderen Thread">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </form>
                <?php endforeach; ?>
            <?php else: ?><!-- ANDERS WORDT DAT HIERONDER GETOONT -->

            <div class="card">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if(isAdmin()): ?>
                        <p class="card-text text-center">
                            U hebt de mogelijkheid om een thread aan te maken, zodat mensen kunnen reageren en vragen te stellen
                        </p>
                        <?php else: ?>
                        <p class="card-text text-center">
                            De admin heeft nog geen thread aangemaakt. 
                        </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php endif; ?>
        </div>
    </div>
</div>
    <!-- EINDE THREADS -->

<div class="container">
    <!-- BEGIN ADD THREAD -->
    <?php if(isAdmin()): ?> 
        <form action="app/uploads/upload_thread.php" enctype="multipart/form-data" method="post"><!-- DEZE FORM WORDT NAAR DE MAP UPLOADS GESTUURD MET ALLE DATA -->
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        <div class="form-group">
                            <label class="text-black">Title</label>
                            <input class="form-control" name="title" placeholder="title(max. 40 tekens)" required>
                        </div>
                    </h3>
                    <div class="row">
                        <div class="col-sm-4">
                            <form>
                                <div class="form-group">
                                    <label class="text-black">Photo</label>
                                    <input class="photoTopicButton" name="photo" type="file" class="form-control-file">
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-8 text-left">
                            <div class="form-group">
                                <label class="text-black">Content</label>
                                <input class="form-control" name="content" placeholder="content" required>
                            </div>
                        </div>
                    </div>
                    <div class="text-center margin-top">
                        <button class="btn btn-primary" name="add_thread">Add <span class="fa fa-plus"></span></button>
                    </div>
                </div>
            </div>
        </form>
    <?php endif; ?>
    <!-- EINDE ADD THREAD -->
</div>

<div class="margin-bottom">

</div>
<!-- EINDE CONTENT -->

<?php

if(isset($_SESSION['success'])){
    unset($_SESSION['success']);
}