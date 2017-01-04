<?php

/**
 * my_alert
 *
 * vypisuje hlasky do header
 */
function myalert($message, $type) 
{
    echo "<script>bootstrap_alert('" . $message . "', '" . $type . "');</script>";
}
