<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>


        <input type = "button" id = "success" value="Success!"/>
        <input type = "button" id = "info" value="Info!"/>
        <input type = "button" id = "warning" value="Warning!"/>
        <input type = "button" id = "danger" value="Danger!"/>
        <div id = "alert_placeholder"></div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>
            bootstrap_alert = function () {};
            bootstrap_alert.success = function (message) {
                $('#alert_placeholder').html('<div class="alert alert-success alert-dismissible" role="alert"><button type=button class=close data-dismiss=alert aria-label=Close><span aria-hidden=true>&times;</span></button>' + message + '</div>');
            };
            bootstrap_alert.info = function (message) {
                $('#alert_placeholder').html('<div class="alert alert-info alert-dismissible" role="alert"><button type=button class=close data-dismiss=alert aria-label=Close><span aria-hidden=true>&times;</span></button>' + message + '</div>');
            };
            bootstrap_alert.warning = function (message) {
                $('#alert_placeholder').html('<div class="alert alert-warning alert-dismissible" role="alert"><button type=button class=close data-dismiss=alert aria-label=Close><span aria-hidden=true>&times;</span></button>' + message + '</div>');
            };
            bootstrap_alert.danger = function (message) {
                $('#alert_placeholder').html('<div class="alert alert-danger alert-dismissible" role="alert"><button type=button class=close data-dismiss=alert aria-label=Close><span aria-hidden=true>&times;</span></button>' + message + '</div>');
            };


            $('#success').on('click', function () {
                bootstrap_alert.success('Your text goes here');
            });
            $('#info').on('click', function () {
                bootstrap_alert.info('Your text goes here');
            });
            $('#warning').on('click', function () {
                bootstrap_alert.warning('Your text goes here');
            });
            $('#danger').on('click', function () {
                bootstrap_alert.danger('Your text goes here');
            });
        </script>
        
        
        <?php
            echo "<script>bootstrap_alert.success('Spustene pomocou PHP')</script>";
        ?>


    </body>
</html>
