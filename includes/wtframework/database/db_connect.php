<?php

/*
*   Change credentials on yours
*/
define("MYSQL_HOST", "127.0.0.1");
define("MYSQL_USER", "root");
define("MYSQL_PASS", "");
define("MYSQL_DB", "catalyst");

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$GLOBALS["dbAdapter"] = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);


/*
*   Creating tables if they doesn't exists
*/

/* ============= USER TABLE ============== */
try {
    $stmt = $GLOBALS["dbAdapter"]->prepare('
    CREATE TABLE IF NOT EXISTS `user` (
        `id` int NOT NULL COMMENT \'ID user\',
        `username` varchar(32) NOT NULL UNIQUE COMMENT \'Username\',
        `password` varchar(255) NOT NULL UNIQUE COMMENT \'Password MD5 Hash\',
        `company` varchar(255) DEFAULT NULL COMMENT \'Company name\',
        `email` varchar(128) NOT NULL UNIQUE COMMENT \'Contact e-mail\'
    );
    ');
    $stmt->execute();

    $stmt = $GLOBALS["dbAdapter"]->prepare('
    START TRANSACTION;
    CREATE INDEX `idx_username` ON `user` (`username`);
    CREATE INDEX `idx_email` ON `user` (`email`);
    CREATE INDEX `idx_company` ON `user` (`company`);
    COMMIT;
    ');
    $stmt->execute();
} catch (mysqli_sql_exception $databaseException) {
    return;
}
/* ====================================== */