<?php
    function isActive($zoekstr){
        $regstr = '/('.$zoekstr.')/';
        return preg_match($regstr, $_SERVER['SCRIPT_NAME']) !=0;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/registreren.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <title>forum Valdemar</title>
</head>
<body>
    
    <!-- BEGIN MENU -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- here a logo -->
            <div class="navbar-header">
                
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
                    <!-- <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> -->
                    <span class="fa fa-bars"></span>
                </button>
                <a href="#" class="navbar-brand">Forum Valdemar</a>

                <!-- <h1 class="navbar-brand">Forum Valdemar</h1> -->
            </div>
            <!-- hier menu links -->    
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="index.php" <?= isActive('index') ? 'class="active"' : "" ?>>Home</a></li>
                    <li><a href="threads.php" <?= isActive('threads') ? 'class="active"' : "" ?>>Threads</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="mailto:forumValdemar@outlook.com?SUBJECT=Vraag forum">Email Me!</a></li>
                            <li><a href="https://www.google.com/maps/place/Alfa-college,+locatie+Boumaboulevard/@53.2063804,6.5906163,15z/data=!4m5!3m4!1s0x0:0x18518737e6041efe!8m2!3d53.2063804!4d6.5906163">Adress</a></li>
                            <li><a href="tel:0612345678">Call me!</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="registreren.php" <?= isActive('registreren') ? 'class="active"' : "" ?>>Registreren</a></li>
                    <li><a href="login.php" <?= isActive('login') ? 'class="active"' : "" ?>>Log In <span class="fa fa-lock"></span><span class="fa fa-toggle"></span></a></li>
                </ul>
            
            <!-- <div class="checkbox">
                    <label>
                        <input type="checkbox" data-toggle="toggle" data-on="normal" data-off="dark" data-onstyle="primary" data-offstyle="success">

                            <?php
                        //     if(data-on == 'normal'){
                        //         include_once('css/menu.css');
                        //         include_once('css/footer.css');
                        //     }else{
                        //         include_once('');
                        //         include_once('css/menu.css');
                        //     }
                        // ?>
                    </label>
                </div> -->
            </div>
        </div>
    </nav>
<!-- EINDE MENU -->