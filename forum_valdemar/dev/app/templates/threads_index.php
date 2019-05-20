<?php
    include_once('app/helpers/db.php');

    $id = $_GET['id'];
    $threads_title = $_GET['title'];

    if(dbConnect()){
        
        dbQuery("SELECT threads.*, 
                users.username
                FROM threads 
                INNER JOIN users ON threads.users_id = users.id
                -- WHERE topics.threads_id =  ");

        //WHERE topics .threads_id= :id, [':id' => $id]

        // $topics = dbGetAll();

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
        
        <div class="page-header">
            <h1>Threads</h1>
        </div>

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
    </div>
</div>
    <!-- EINDE THREADS -->

<div class="container">
    <!-- BEGIN ADD THREAD -->
    <?php if(isAdmin()): ?> 
        <form action="app/uploads/upload_thread.php" method="post">
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
                                    <input class="photoTopic" name="photo" type="file" class="form-control-file">
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