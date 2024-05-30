CREATE TABLE IF NOT EXISTS `role` (
    `id` int NOT NULL COMMENT 'Role ID' AUTO_INCREMENT,
    `name` varchar(255) NOT NULL COMMENT 'Role name',
    `admin_rights` int COMMENT 'Admin rights',
    `applications_list` int COMMENT 'Access to applications list',
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `user` (
    `id` int NOT NULL COMMENT 'User ID' AUTO_INCREMENT,
    `username` varchar(32) NOT NULL UNIQUE COMMENT 'Username',
    `password` varchar(255) NOT NULL COMMENT 'Password MD5 Hash',
    `company` varchar(255) DEFAULT NULL COMMENT 'Company name',
    `email` varchar(128) NOT NULL UNIQUE COMMENT 'Contact e-mail',
    `role_id` int DEFAULT NULL COMMENT 'Role ID',
    FOREIGN KEY (`role_id`) REFERENCES `role`(`id`),
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `application_statuses` (
    `id` int NOT NULL COMMENT 'Status ID' AUTO_INCREMENT,
    `name` varchar(255) COMMENT 'Status name',
    `color` varchar(255) COMMENT 'Status',
    PRIMARY KEY (`id`)
);

START TRANSACTION;
    CREATE INDEX `idx_username` ON `user` (`username`);
    CREATE INDEX `idx_email` ON `user` (`email`);
    CREATE INDEX `idx_company` ON `user` (`company`);
COMMIT;

CREATE TABLE IF NOT EXISTS `applications` (
    `id` int NOT NULL AUTO_INCREMENT,
    `author_id` int DEFAULT NULL,
    `manager_id` int DEFAULT NULL,
    `status` int DEFAULT NULL,
    `text` VARCHAR(2048),
    `creation_date` int,
    FOREIGN KEY (`author_id`) REFERENCES `user`(`id`),
    FOREIGN KEY (`manager_id`) REFERENCES `user`(`id`),
    FOREIGN KEY (`status`) REFERENCES `application_statuses`(`id`),
    PRIMARY KEY (`id`)
);

INSERT INTO `role`(`name`, `admin_rights`, `applications_list`) VALUES('administrator', '1', '1');
INSERT INTO `role`(`name`, `admin_rights`, `applications_list`) VALUES('manager', '0', '1');
INSERT INTO `application_statuses`(`name`, `color`) VALUES('waiting', '#ffd500');
INSERT INTO `application_statuses`(`name`, `color`) VALUES('desclined', '#FF0000');
INSERT INTO `application_statuses`(`name`, `color`) VALUES('success', '#00FF00');