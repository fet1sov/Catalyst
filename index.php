<?php

require("includes/wtframework/includes.php");
require("globals.php");

$router = new Router();

/*
*   Main Page
*/
$router->add("/", "routes/index/index.ctrl.php");


/*
*   Authorization Pages
*/
$router->add("/auth", "routes/auth/auth.ctrl.php");
$router->add("/register", "routes/register/register.ctrl.php");

/*
*   User routes
*/
$router->add("/user/{category}", "routes/user/user.ctrl.php");

/*
*   API routes
*/
$router->add("/api/{category}", "routes/api/api.ctrl.php");