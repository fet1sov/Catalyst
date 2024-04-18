<?php

/**
*   WTFFramework
*   github.com/fet1sov/WTFramework
*
*   @author fet1sov <prodaugust21@gmail.com>
*/

session_start();

/* Loading all modules */
$modules = glob(__DIR__ . '/*.php');
foreach ($modules as $module) {
    require_once($module);
}

/* Loading all database */
$modules = glob(__DIR__ . '/database/*.php');
foreach ($modules as $module) {
    require_once($module);
}

$modules = glob($_SERVER["DOCUMENT_ROOT"] . '/backend/models/*.php');
foreach ($modules as $module) {
    require_once($module);
}