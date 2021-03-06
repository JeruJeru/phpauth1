<?php include_once "_inc/config.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title></title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?= asset('/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= asset('/css/styl.css') ?>">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <!--<link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

        <!-- Custom javascript -->
        <script src="<?= asset('/js/my-alert-bootstrap.js') ?>"></script>

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="assets/js/ie-emulation-modes-warning.js"></script>
    </head>

    <body class="<?= segment(1) ? plain(segment(1)) : 'home' ?>">

        <!-- Static navbar -->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Project name</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="register">Register</a></li>
                        <li><a href="login">Login</a></li>
                        <?php if ($auth->isLogged()) echo '<li><a href="logout">LogOut</a></li>' ; ?>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <header class="container">
            <div id="alert_placeholder"></div>
            
            <?php
            if (!$auth->isLogged()) {
                header('HTTP/1.0 403 Forbidden');
                //flash()->info('Si neprihlásený, choj sa prihlásiť');
                // exit();
            } else {
                //flash()->info('Vitaj, si prihlásený :-)');
            }
            ?>
            <?= flash()->display() ?>

        </header>

        <div class="main-container">
            <div class="container">