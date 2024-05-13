<?php

/*
*   Change credentials on yours
*/
define("MYSQL_HOST", "database");
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
    CREATE TABLE IF NOT EXISTS `role` (
        `id` int NOT NULL COMMENT \'Role ID\' AUTO_INCREMENT,
        `name` varchar(255) NOT NULL COMMENT \'Role name\',
        `admin_rights` int COMMENT \'Admin rights\',
        `applications_list` int COMMENT \'Access to applications list\',
        PRIMARY KEY (`id`)
    );
    ');
    $stmt->execute();

    $stmt = $GLOBALS["dbAdapter"]->prepare('
    CREATE TABLE IF NOT EXISTS `user` (
        `id` int NOT NULL COMMENT \'User ID\' AUTO_INCREMENT,
        `username` varchar(32) NOT NULL UNIQUE COMMENT \'Username\',
        `password` varchar(255) NOT NULL COMMENT \'Password MD5 Hash\',
        `company` varchar(255) DEFAULT NULL COMMENT \'Company name\',
        `email` varchar(128) NOT NULL UNIQUE COMMENT \'Contact e-mail\',
        `role_id` int DEFAULT NULL COMMENT \'Role ID\',
        FOREIGN KEY (`role_id`)  REFERENCES `role`(`id`),
        PRIMARY KEY (`id`)
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

    $stmt = $GLOBALS["dbAdapter"]->prepare('
    CREATE TABLE IF NOT EXISTS `applications` (
        `id` int NOT NULL COMMENT \'Application ID\' AUTO_INCREMENT,
        `author_id` int NOT NULL COMMENT \'Application author ID (user.id)\',
        `manager_id` int COMMENT \'Manager ID (user.id)\',
        FOREIGN KEY (`author_id`) REFERENCES `user`(`id`),
        FOREIGN KEY (`manager_id`) REFERENCES `user`(`id`),
        PRIMARY KEY (`id`)
    );
    ');
    $stmt->execute();
    
} catch (mysqli_sql_exception $databaseException) {
    return;
}
/* ====================================== */