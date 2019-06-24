<?php
    include_once('app/helpers/db.php');

    if(!isset($_GET['id'])){
        header('Location: index.php');
        exit(0);
    }

    if(dbConnect()){  
        $thread_id = $_GET['id'];
        $_SESSION['thread_id'] = $thread_id;

        dbQuery("SELECT topic.*, 
                users.username
                FROM topic 
                INNER JOIN users ON topic.user_id = users.id
                WHERE topic.thread_id = :id", [
                    ':id' => $thread_id
                ]);

        $topics = dbGetAll();                                                                          //alle informatie die van de database komenn worden hier neergezet
    }
?>

<!-- BEGIN CONTENT -->
<div class="container">
    <div class="row">

        <div class="page-header p-5">
            <h1 class="text-left">Topics</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 text-left">
            <a class="doorverwijzen" href="threads.php"><span class="fas fa-angle-double-left"></span> Previous</a>
        </div>
    </div>

        
    <div class="row">

        <!-- BEGIN TOPICS -->
            <div class="col-sm-12 mt-2" id="topic3">
            <?php if(count($topics) > 0): ?><!-- ALS DE COUNT VAN TOPICS HOGER IS DAN 0 DAN TOONT HIJ DE TOPICS -->
                <?php foreach($topics as $topic): ?>
                    <form action="app/verwijderen_uploads/crud_verwijderen_uploads.php?id=<?= $topic['id'] ?>" method="post">
                        <a class="topics" href="reactions.php?id=<?= $topic['id'] ?>">
                            <div class="card">
                                <div class="card-body">
                                    <h3><?= $topic['titel']?></h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img class="foto_thread" src="<?= getTopicImage($topic['foto_topic']) ?>" alt="only png allowed...">
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="card-text text-left">
                                                <?= $topic['content'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="rechts text-right">
                                        <p class="actor text-right" id="actor">
                                        <?php
                                            $_SESSION['username'] = $topic['username'];
                                        ?>
                                            Acteur: <?= $topic['username'] ?> <span class="fas fa-user"></span><br>
                                        </p>
                                        <p class="date text-right" id="date">
                                            Datum: <?= $topic['datum'] ?> <span class="far fa-calendar-alt"></span><br>
                                        </p>

                                        <?php if(isLoggedIn()): ?>
                                                <?php if(isAdmin() || $topic['user_id'] === $_SESSION['user_id']): ?>
                                                    <div class="text-right">
                                                        <input type="submit" name="verwijderen_topic" class="btn btn-danger" value="Verwijderen topic">
                                                    </div>
                                                <?php endif; ?>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </form>
                <?php endforeach; ?>
            <?php else: ?><!-- ANDERS WORDT DAT HIERONDER GETOONT -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <p class="card-text">
                                    Er is geen topic aangemaakt bij deze thread, log in om een topic aan te maken.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            </div>
        <!-- EINDE TOPICS -->

            <div class="col-sm-12 margin-bottom">
                <?php if(isLoggedIn()): ?>
                    <form action="app/uploads/upload_topics.php?id=<?= $thread_id ?>" enctype="multipart/form-data" method="post"><!-- DEZE FORM WORDT NAAR DE MAP UPLOADS GESTUURD MET ALLE DATA -->
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">
                                    <div class="form-group">
                                        <label class="text-black">Title</label>
                                        <input class="form-control" name="titel" placeholder="Titel" required>
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
                                    <button class="btn btn-primary" name="add_topic">Add <span class="fa fa-plus"></span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>

    </div>

</div>
<!-- EINDE CONTENT -->