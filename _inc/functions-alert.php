<?php

/**
 * my_alert
 *
 * vypisuje hlasky do header
 * 
 * @param string $message text hlasky
 * @param string $type typ hlasky (alert-success, alert-info, alert-warning, alert-danger)
 */
function myalert($message, $type) 
{
    echo "<script>bootstrap_alert('" . $message . "', '" . $type . "');</script>";
}
