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
                if (count($userData))
                {
                    $stmt = $GLOBALS["dbAdapter"]->prepare("INSERT INTO `user`(`id`, `username`, `password`, `company`, `email`) VALUES (NULL, ?, ?, ?, ?)");
                    $stmt->bind_param('ssss', 
                    $userData["username"],
                    md5($userData["password"]),
                    $userData["company"],
                    $userData["email"]
                    );
                    $stmt->execute();

                    $this->id = $GLOBALS["dbAdapter"]->insert_id;
                    $this->username = $userData["username"];
                    $this->password = $userData["password"];
                    $this->company = $userData["company"];
                    $this->email = $userData["email"];
                }
            }
        } else {
            $stmt = $GLOBALS["dbAdapter"]->prepare("INSERT INTO `user`(`id`, `username`, `password`, `company`, `email`) VALUES (NULL, ?, ?, ?, ?)");
            $stmt->bind_param(
                'ssss',
                $userData["username"],
                md5($userData["password"]),
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

    public function saveData() : void
    {
        $stmt = $GLOBALS["dbAdapter"]->prepare("UPDATE `user` SET `username`=?, `password`=?, `company`=?, `email`=? WHERE `id`=?");
        $stmt->bind_param(
            'ssss',
            $this->username,
            $this->password,
            $this->company,
            $this->email,
            $this->id
        );
        $stmt->execute();
    }
}