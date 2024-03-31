<?php

/*
*   Change credentials on yours
*/
define("MYSQL_HOST", "localhost");
define("MYSQL_USER", "root");
define("MYSQL_PASS", "");
define("MYSQL_DB", "catalyst");

$GLOBALS["dbAdapter"] = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);