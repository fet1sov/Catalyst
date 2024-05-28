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
    CREATE TABLE IF NOT EXISTS `application_statuses` (
        `id` int NOT NULL COMMENT \'Status ID\' AUTO_INCREMENT,
        `name` int COMMENT \'Status name\',
        `color` int COMMENT \'Status\',
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
        `author_id` int NOT NULL COMMENT \'Application author ID\',
        `manager_id` int DEFAULT NULL COMMENT \'Manager ID\',
        `status` int DEFAULT NULL COMMENT \'Status\',
        FOREIGN KEY (`author_id`) REFERENCES `user`(`id`),
        FOREIGN KEY (`manager_id`) REFERENCES `user`(`id`),
        FOREIGN KEY (`status`) REFERENCES `application_statuses`(`id`),
        PRIMARY KEY (`id`)
    );
    ');
    $stmt->execute();
 
    /* Creating admin role */
    $stmt = $GLOBALS["dbAdapter"]->prepare('INSERT INTO `role`(`name`, `admin_right`, `applications_list`) VALUES(\'administrator\', \'1\', \'1\')');
    $stmt->execute();

    $stmt = $GLOBALS["dbAdapter"]->prepare('INSERT INTO `role`(`name`, `admin_right`, `applications_list`) VALUES(\'administrator\', \'0\', \'1\')');
    $stmt->execute();

    /* Applications statuses */
    $stmt = $GLOBALS["dbAdapter"]->prepare('INSERT INTO `applications_statuses`(`name`, `color`) VALUES(\'waiting\', \'#ffd500\')');
    $stmt->execute();
    $stmt = $GLOBALS["dbAdapter"]->prepare('INSERT INTO `applications_statuses`(`name`, `color`) VALUES(\'desclined\', \'#FF0000\')');
    $stmt->execute();
    $stmt = $GLOBALS["dbAdapter"]->prepare('INSERT INTO `applications_statuses`(`name`, `color`) VALUES(\'success\', \'#00FF00\')');
    $stmt->execute();

} catch (mysqli_sql_exception $databaseException) {
    return;
}