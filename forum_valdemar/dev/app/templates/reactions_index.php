<?php
    include_once('app/helpers/db.php');

    $id = $_GET['id'];
    // $threads_title = $_GET['title'];

    if(dbConnect()){
        dbQuery(
            "SELECT * FROM topic 
                WHERE id = :id", 
            [':id' => $id]
        );

        $topics = dbGetAll();

        echo "<pre>";
        print_r($topics);
        echo "</pre>";
        
        dbQuery("SELECT reactions.*, 
                users.username
                FROM reactions 
                INNER JOIN users ON reactions.user_id = users.id");

        //WHERE topics .threads_id= :id, [':id' => $id]

        $reacties = dbGetAll();                                                                          //alle informatie die van de database komenn worden hier neergezet

    }
?> 
 
<!-- BEGIN CONTENT -->
<div class="container">
    <!-- hier ga ik terug naar de topics -->
    <div class="page-header">
        <h1 class="text-left">Reactions</h1>
    </div>
    <div class="previous text-left" id="previous" onclick="previousTopic()" onmouseover="mouseover()"
        onmouseout="mouseout()"><span class="fas fa-angle-double-left"></span> Previous</div>

    <div id="thread" class="row first-row last-row">
        <?php foreach($topics as $topic): ?>
            <div class="col-sm-12" id="threads">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><?= $topic['titel'] ?></h3>
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
                            <p class="reaction text-right">
                                <?= $topic['user_id'] ?> <span class="fas fa-comments"></span><br>
                            </p>
                            <p class="reaction text-right">
                                <?= $topic['datum'] ?> <span class="fas fa-user"></span><br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <div class="row">

        <!-- BEGIN REACTIE -->
        <?php foreach($reacties as $reactie): ?>
            <div class="col-md-1"></div>
            <div class="reactions col-sm-12 col-xs-12 col-md-11" id="reaction">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2 profielfoto">
                                <img class="profielfoto" src="img/pf2.jpg" alt="failed loading..."><br>
                                <h5>user_id: <?= $reactie['user_id'] ?></h5>
                            </div>
                            <div class="col-sm-10">
                                <br><br>
                                <p class="card-text text-left">
                                    <?= $reactie['reaction'] ?>
                                </p>
                            </div>
                        </div>

                        <?php if(isLoggedIn()): ?>
                        <div class="rechts text-right">
                            <p class="reaction text-right" id="reaction">
                                <button class="btn btn-primary" id="thumbsUp" style="display: inline"
                                    onclick="likeIt()">Useful <span class="fas fa-thumbs-up"></span></button>
                                <button class="btn btn-danger" id="thumbsDown" style="display: none"
                                    onclick="hateIt()">Not useful <span class="fas fa-thumbs-down"></span></button>
                            </p>
                            <p class="reaction text-right">
                                <?= $reactie['datum'] ?> <span class="fas fa-user"></span><br>
                            </p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
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
                                                placeholder="geef hier uw reactie weer!">   
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