<?php

require_once '_inc/config.php';

// you ain't even logged in, what are you doing
if (!logged_in()) {
    header('Location:' . $base_url . '/index.php');
}

// log yourself out, bro
do_logout();

// flash it & go home
flash()->info('Majte sa pekne :-)');
redirect('/');
