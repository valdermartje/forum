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
        <div class="page-header p-5">
            <h1>Home</h1>
        </div>
        <p class="p-5">
        <b>Welkom!</b> Met trots presenteren wij ons gloednieuwe forum. Browse door onze threads en topics, stel uw vragen of beantwoordt juist de vragen van anderen.<br> Dit is de plaats waar u uw vragen kunt stellen.<br><br>

        Als u naar de menu bovenaan deze pagina kijkt, dan ziet u verschillende kopjes. U kunt zich registreren en inloggen om deel uit te maken op deze forum. U kunt ook naar de threads en topics gaan om naar hun vragen te kijken en de reacties eronder te lezen.<br><br>

        Mocht u nog geen lid zijn dan kunt u onder <?php if(isNotLoggedIn()): ?><a href="registreren.php" class="linkje">registreren </a><?php endif; ?> <?php if(isLoggedIn()): ?>registreren <?php endif; ?>kiezen voor om een account aan te maken.<br><br> Geregistreerde forum leden zien rechts bovenin hun forumnaam en als ze daarop klikken zien ze hun hele overzicht.<br> Deze leidt naar de persoonlijke profielpagina.<br>Er zit ook een knop van instellingen en daar kunt u uw profiel instellen, een (andere) profielfoto uploaden of uw wachtwoord wijzigen.<br>
        </p>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="page-header p-5">
            <h1>Threads</h1>
        </div>
        
        <!-- BEGIN THREADS -->
        <div class="col-sm-12 mt-2">
            <?php foreach($threads as $thread): ?><!-- nu kan ik alle informatie gebruiken in html-->
            <form action="app/verwijderen_uploads/crud_verwijderen_uploads.php?id=<?= $thread['id'] ?>" method="post">
                <a class="threads" href="topic.php?id=<?= $thread['id'] ?>">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"><?= $thread['title']?></h3>
                            <div class="row">
                                <div class="col-sm-4">
                                    <img class="foto_thread" src="<?= getThreadImage($thread['foto_thread']) ?>" width="250px" height="auto" alt="failed loading...">
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
                                        <input type="submit" name="verwijderen_thread" class="btn btn-danger" value="Verwijderen Thread">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </form>
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