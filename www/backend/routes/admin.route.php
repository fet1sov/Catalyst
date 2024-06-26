<?php

/*
*   Admin routes
*/
$router->add("/admin/", ROUTE_ROOT . "admin.ctrl.php");
$router->add("/admin/{category}", ROUTE_ROOT . "admin.ctrl.php");