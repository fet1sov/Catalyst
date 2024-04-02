<?php

/**
*   user.php
*   Entity model of user
*
*   @author fet1sov <prodaugust21@gmail.com>
*/

class User extends DatabaseEntity {
    protected $id = 0;
    protected $username = "";
    protected $password = "";
    protected $company = "";
    protected $email = "";

    public function __construct($id = 0, $userData = array()) {
        $this->id = $id;

        if ($id >= 1)
        {
            $stmt = $GLOBALS["dbAdapter"]->prepare("SELECT * FROM `user` WHERE id=?");
            $stmt->bind_param('i', $this->$id);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows() >= 1)
            {
                $userResult = $stmt->get_result();
                $rows = $userResult->fetch_array(MYSQLI_ASSOC);

                $this->username = $rows[0]["username"];
                $this->password = $rows[0]["password"];
                $this->company = $rows[0]["company"];
                $this->email = $rows[0]["email"];
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
                    $this->password = md5($userData["password"]);
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
}