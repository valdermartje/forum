<?php
    include_once('app/helpers/db.php');

    if(dbConnect()){
        
        dbQuery("SELECT topic.*, 
                users.username
                FROM topic 
                INNER JOIN users ON topic.user_id = users.id");

        //WHERE topics .threads_id= :id, [':id' => $id]

        // $topics = dbGetAll();

        $topics = dbGetAll();                                                                          //alle informatie die van de database komenn worden hier neergezet

    }
?>

<!-- BEGIN CONTENT -->
<div class="container">
    <div class="row">
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

        <div class="page-header">
            <h1 class="text-left">Topics</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 text-left">
            <div class="previous" id="previous" onclick="previous()" onmouseover="mouseover()"
                onmouseout="mouseout()"><span class="fas fa-angle-double-left"></span> Previous</div>
        </div>
        <br><br>

        <div class="text-right">
            <?php if(isAdmin()): ?>
                <button class="btn btn-danger" id="deleteTopic" onclick="deleteTopic()" style="display: inline">Delete
                    topic</button>
                <button class="btn btn-danger" id="deleteTopic_hidden" onclick="deleteTopic_hidden()"
                    style="display: none">Delete topic</button>
            <?php endif; ?>
        </div>
    </div>

        
    <div class="row">
        <!-- BEGIN TOPICS -->
            <div class="col-sm-12 mt-2" id="topic3">
                <?php foreach($topics as $topic): ?>
                    <a href="reactions.php?id=<?= $topic['id'] ?>">
                        <div class="card">
                            <div class="card-body">
                                <h3><?= $topic['titel']?></h3>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img class="" src="img/bg2.jpg" width="250px" height="auto" alt="failed loading...">
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="card-text text-left">
                                            <?= $topic['content'] ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="rechts text-right">
                                    <p class="deleteTopic" style="display: none; color: red;">Delete <span
                                            class="fas fa-trash-alt"></span></p>
                                    <p class="actor text-right" id="actor">
                                        Acteur: <?= $topic['username'] ?> <span class="fas fa-user"></span><br>
                                    </p>
                                    <p class="date text-right" id="date">
                                        Datum: <?= $topic['datum'] ?> <span class="far fa-calendar-alt"></h3><br>
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
        <!-- EINDE TOPICS -->

            <div class="col-sm-12 margin-bottom"> <!-- DIT WERKT -->
                <?php if(isLoggedIn()): ?>
                    <form action="app/uploads/upload_topics.php" method="post">
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