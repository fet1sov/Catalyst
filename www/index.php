<?php

require("includes/wtframework/includes.php");
require("globals.php");

define("ROUTE_ROOT", "backend/routes/");
$router = new Router();

/*
*   Main Page
*/
$router->add("/", ROUTE_ROOT . "index/index.ctrl.php");

/*
*   Authorization Pages
*/
$router->add("/auth", ROUTE_ROOT . "auth/auth.ctrl.php");
$router->add("/register", ROUTE_ROOT . "register/register.ctrl.php");

/*
*   User routes
*/
$router->add("/user/", ROUTE_ROOT . "user/user.ctrl.php");
$router->add("/user/{category}/", ROUTE_ROOT . "user/user.ctrl.php");

/*
*   API routes
*/
$router->add("/api/{category}", ROUTE_ROOT . "api/api.ctrl.php");

/*
*   Admin routes
*/
$router->add("/admin/", ROUTE_ROOT . "admin/admin.ctrl.php");
$router->add("/admin/{category}/", ROUTE_ROOT . "admin/admin.ctrl.php");

/*
*   404 NOT FOUND p_p
*/
$router->pageNotFound(ROUTE_ROOT . "404/404.ctrl.php");