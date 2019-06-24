<?php
    include_once('app/helpers/db.php');
    include_once('app/helpers/helper_functions.php');

    $topic_id = $_GET['id'];
    $_SESSION['topic_id'] = $topic_id;

    if(dbConnect()){

        // HIER GA IK MIJN TOPIC TONEN MET DE ID
        dbQuery(
            "SELECT * FROM topic
                WHERE id = :id",
            [':id' => $topic_id]
        );

        $topics = dbGetAll();

        dbQuery("SELECT reactions.*, 
                users.username, users.profielfoto
                FROM reactions 
                INNER JOIN users ON reactions.user_id = users.id
                WHERE reactions.topic_id = :topic_id", [
                    ':topic_id' => $topic_id
                ]);

        $reacties = dbGetAll();                                                                          //alle informatie die van de database komenn worden hier neergezet
    }
?> 
 
<!-- BEGIN CONTENT -->
<div class="container">
    <div class="row">
        <div class="page-header p-5">
            <h1 class="text-left">Reactions</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 text-left">
            <a class="doorverwijzen" href="topic.php?id=<?= $_SESSION['thread_id'] ?>"><span class="fas fa-angle-double-left"></span> Previous</a>
        </div>
    </div>

    <!-- BEGIN Dit is de topic waar ze op reageren -->
    <div id="thread" class="row first-row last-row">
        <?php foreach($topics as $topic): ?>
            <div class="col-sm-12" id="threads">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><?= $topic['titel'] ?></h3>
                        <div class="row">
                            <div class="col-sm-4">
                                <img class="foto_thread" src="<?= getTopicImage($topic['foto_topic']) ?>" width="100px" height="100px" alt="Only png allowed...">
                            </div>
                            <div class="col-sm-8">
                                <p class="card-text text-left">
                                    <?= $topic['content'] ?>
                                </p>
                            </div>
                        </div>
                        <div class="rechts text-right">
                            <p class="reaction text-right">
                                <?= $topic['datum'] ?> <span class="fas fa-calendar-alt"></span><br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- EINDE Dit is de topic waar ze op reageren -->

    <div class="row">
        <!-- BEGIN REACTIE -->
        <?php if(count($reacties) > 0): ?>
        <?php foreach($reacties as $reactie): ?>
            <form action="app/verwijderen_uploads/crud_verwijderen_uploads.php?id=<?= $reactie['id'] ?>" method="post">
                <div class="col-md-1"></div>
                <div class="reactions col-sm-12 col-xs-12 col-md-11" id="reaction">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2 profielfoto">
                                    <img class="profielfoto" src="<?= getProfileImage($reactie['profielfoto']) ?>" alt="failed loading..."><br>
                                    <h5><?= $reactie['username'] ?> <span class="fas fa-user"></span></h5>
                                </div>
                                <div class="col-sm-10">
                                    <br><br>
                                    <p class="card-text text-left">
                                        <?= $reactie['reaction'] ?>
                                    </p>
                                </div>
                            </div>

                            <div class="rechts text-right">
                                <p class="reaction text-right">
                                    <?= $reactie['datum'] ?> <span class="far fa-calendar-alt"></span><br>
                                </p>
                                <?php if(isLoggedIn()): ?>
                                    <?php if(isAdmin() || $reactie['user_id'] === $_SESSION['user_id']): ?>
                                        <input type="submit" name="verwijderen_reactie" class="btn btn-danger" value="Verwijderen reactie">
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>
        <?php else: ?>
            <div class="col-md-1"></div>
            <div class="reactions col-sm-12 col-xs-12 col-md-11" id="reaction">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <p class="card-text text-left">
                                    Nog geen reactie aangemaakt, log in om een reactie te plaatsen.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- EINDE REACTIE -->

        <!-- BEGIN REACTIONS MAKEN -->
        <?php if(isLoggedIn()): ?>
            <form action="app/uploads/uploads_reactions.php" method="post">
                <div class="col-md-1"></div>
                    <div class="reactions col-sm-12 col-xs-12 col-md-11 margin-bottom" id="reaction">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-2 profielfoto">
                                        <?php if(isset($_SESSION['profielfoto'])): ?>
                                            <img class="profielfoto" src="data:image/jpg; base64, <?= base64_encode($_SESSION['profielfoto']) ?>" alt="failed loading..."><br>
                                        <?php endif; ?>
                                        <?php if(!isset($_SESSION['profielfoto'])): ?>
                                            <img class="profielfoto" src="img/pf2.jpg">
                                        <?php endif; ?>
                                        <h5><?= $_SESSION['username'] ?></h5>
                                    </div>
                                    <div class="col-xs-10 reactie">
                                        <div class="row">
                                            <div class="col-xs-12">
                                            <br><br>
                                            <input class="reactie" type="text" name="reaction"
                                                placeholder="geef hier uw reactie weer!" required>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rechts text-right">
                                <p class="reaction text-right" id="reaction">
                                    <button class="btn btn-primary" name="add_reaction" id="thumbsUp" style="display: inline">Upload <span class="fas fa-upload"></span></button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php endif; ?>
        <!-- EINDE REACTIONS MAKEN -->

    </div>
</div>
    <!-- EINDE CONTENT -->

<?php if(!isLoggedIn()): ?>
    <div class="margin-bottom-reaction">

    </div>
<?php endif;