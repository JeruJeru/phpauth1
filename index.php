<?php
require_once '_inc/config.php';
use \Tamtamchik\SimpleFlash\Flash;


$routes = [

    // HOMEPAGE
    '/' => [
        'GET' => 'home.php'
    ],
    
    // HOMEPAGE - index.php on ale v blogu nema (pozriet ako mu to funguje)
    '/index.php' => [
        'GET' => 'home.php'
    ],
    
    // USER
    '/user' => [
    	'GET'  => 'user.php'                // user profile
    ],
    
    // LOGIN
    '/login' => [
        'GET' => 'login.php',               // login form
        'POST' => 'login.php',              // do login
    ],
    
    // REGISTER
    '/register' => [
        'GET' => 'register.php',            // register form
        'POST' => 'register.php',           // do register
    ],
    
    // LOGOUT
    '/logout' => [
        'GET' => 'logout.php',              // logout user
    ],
    
    // POST
    '/page' => [
        'GET' => 'page.php',                // show post
        'POST' => '_admin/post-add.php',    // add new post
    ],
    
    // EDIT
    '/edit' => [
        'GET' => 'edit.php', // edit form
        'POST' => '_admin/post-edit.php',   // store new values
    ],
    
    // DELETE
    '/delete' => [
        'GET' => 'delete.php',              // delete form
        'POST' => '_admin/post-delete.php', // make the delete
    ],
];

$page = segment(1);

$method = $_SERVER['REQUEST_METHOD'];


// show page
if (!isset($routes["/$page"][$method])) {
    show_404();
}

echo $routes["/$page"][$method];
require $routes["/$page"][$method];
