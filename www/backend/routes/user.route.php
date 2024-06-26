<?php

/*
*   User routes
*/
$router->add("/user/", ROUTE_ROOT . "user.ctrl.php");
$router->add("/user/{category}/", ROUTE_ROOT . "user.ctrl.php");