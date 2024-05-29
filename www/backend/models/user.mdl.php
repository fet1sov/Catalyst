<?php

/**
*   user.php
*   Entity model of user
*
*   @author fet1sov <prodaugust21@gmail.com>
*/
class User extends DatabaseEntity {
    public $id = 0;
    public $username = "";
    public $password = "";
    public $company = "";
    public $email = "";

    public function __construct($id = 0, $userData = array()) {
        $this->id = $id;

        $createRowFlag = false;

        if ($id >= 1)
        {
            $stmt = $GLOBALS["dbAdapter"]->prepare("SELECT COUNT(`id`) FROM `user` WHERE `id`=?");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows() >= 1)
            {
                $stmt = $GLOBALS["dbAdapter"]->prepare("SELECT * FROM `user` WHERE `id`=?");
                $stmt->bind_param('i', $id);
                $stmt->execute();

                $userResult = $stmt->get_result();
                $row = $userResult->fetch_array(MYSQLI_ASSOC);

                $this->username = $row["username"];
                $this->password = $row["password"];
                $this->company = $row["company"];
                $this->email = $row["email"];
            } else {
                if (!count($userData))
                {
                    $createRowFlag = true;
                }
            }
        } else {
            $createRowFlag = true;
        }

        if ($createRowFlag)
        {
            $md5PasswordHash = md5($userData["password"]);

            $stmt = $GLOBALS["dbAdapter"]->prepare("INSERT INTO `user`(`username`, `password`, `company`, `email`) VALUES (?, ?, ?, ?)");
            $stmt->bind_param(
                'ssss',
                $userData["username"],
                $md5PasswordHash,
                $userData["company"],
                $userData["email"]
            );
            $stmt->execute();

            $this->id = $GLOBALS["dbAdapter"]->insert_id;
            $this->username = $userData["username"];
            $this->password = md5($userData["password"]);
            $this->company = $userData["company"];
            $this->email = $userData["email"];
        }
    }

    public function getPermissions() : array {
        $stmt = $GLOBALS["dbAdapter"]->prepare("SELECT `role`.`admin_rights`, `role`.`applications_list` FROM `user` INNER JOIN `role` ON `user`.`role_id` = `role`.`id` WHERE `user`.`id`=?");
        $stmt->bind_param('i', $this->id);
        $stmt->execute();

        $rightResult = $stmt->get_result();
        return $rightResult->fetch_array(MYSQLI_ASSOC);
    }

    public function saveData() : void
    {
        $stmt = $GLOBALS["dbAdapter"]->prepare("UPDATE `user` SET `username`=?, `password`=?, `company`=?, `email`=? WHERE `id`=?");
        $stmt->bind_param(
            'ssssi',
            $this->username,
            $this->password,
            $this->company,
            $this->email,
            $this->id
        );
        $stmt->execute();
    }
}