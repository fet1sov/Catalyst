<?php

require("includes/wtframework/includes.php");

$router = new Router();

/*
*   Main Page
*/
$router->add("/", "pages/welcome.php");