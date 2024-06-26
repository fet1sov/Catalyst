<?php

define("ROUTE_ROOT", "backend/controllers/");
define("BACKEND_ROUTES", "backend/routes/");
define("FRONTEND_VIEWS", "frontend/views/");

require("includes/wtframework/includes.php");
require("globals.php");

$router = new Router();

/*
*   Main Page
*/
$router->add("/", ROUTE_ROOT . "index.ctrl.php");

$modules = glob(__DIR__ . '/' . BACKEND_ROUTES . '/*.php');
foreach ($modules as $module) {
    require_once($module);
}

/*
*   404 NOT FOUND p_p
*/
$router->pageNotFound(ROUTE_ROOT . "404.ctrl.php");