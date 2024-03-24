<?php

require("includes/wtframework/includes.php");

$router = new Router();

/*
*   Main Page
*/
$router->add("/", "pages/home.php");


/*
*   Authorization Pages
*/
$router->add("/auth", "pages/auth.php");
$router->add("/register", "pages/register.php");