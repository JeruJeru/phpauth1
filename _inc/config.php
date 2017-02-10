<?php

// show all errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);    // "-1" chybove hlasky, "1" ziadne chybove hlasky
//error_reporting(E_ALL & ~E_NOTICE);

// pre tamtamchik/simple-flash
if (!session_id()) @session_start();
require_once 'vendor/autoload.php';


// constants & settings
define('BASE_URL', 'http://localhost/phpauth1');


// configurations
$config = [

    'db' => [
        'type' => 'mysql',
        'name' => 'phpauth1',
        'server' => 'localhost',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8'
    ]
];

// connect to db
$db = new PDO(
        "{$config['db']['type']}:host={$config['db']['server']};
	dbname={$config['db']['name']};charset={$config['db']['charset']}", $config['db']['username'], $config['db']['password']
);

// co sa ma stat ak urobim chybu napr MySQL dotaze
// ERRMODE_SILENT - vypise chybu a koniec
// ERRMODE_SILENT - nevypise chybu
// ERRMODE_WARNING - nevypise chybu a webka pokracuje dalej
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// PDO pripravy SQL skor ako ho vlozi do databazy, ale nove verzie MySQL si ten kod vedia pripravit samy
// defalul je to nastavene na true, cize aby PDO propravoval
// pri novych verziach MYSQL nastavujeme ATTR_EMULATE_PREPARES na false
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// global functions
require_once 'functions-general.php';
require_once 'functions-string.php';
require_once 'functions-alert.php';
require_once 'functions-pages.php';
require_once 'functions-auth.php';


// PHPAuth
include("vendor/PHPAuth/Config.php");
include("vendor/PHPAuth/Auth.php");

$auth_config = new PHPAuth\Config($db);
$auth = new PHPAuth\Auth($db, $auth_config, "cs_CZ");
