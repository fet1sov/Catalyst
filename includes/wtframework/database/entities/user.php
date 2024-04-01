<?php

/**
*   user.php
*   Entity model of user
*
*   @author fet1sov <prodaugust21@gmail.com>
*/

class User {
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
                    $stmt->bind_param('s, s, s, s, s', 
                    $userData["username"],
                    md5($userData["password"]),
                    $userData["company"],
                    $userData["email"]
                    );
                    $stmt->execute();

                    $this->username = $userData["username"];
                    $this->password = md5($userData["password"]);
                    $this->company = $userData["company"];
                    $this->email = $userData["email"];
                }
            }
        }
    }

    public function getUsername() : ?string
    {
        return $this->username;
    }

    public function setUsername($username) : void
    {
        $this->username = $username;
    }

    public function getPassword() : ?string
    {
        return $this->password;
    }

    public function setPassword($password) : void
    {
        $this->password = $password;
    }

    public function getCompany() : ?string
    {
        return $this->company;
    }

    public function setCompany($company) : void
    {
        $this->company = $company;
    }

    public function getEmail() : ?string
    {
        return $this->email;
    }

    public function setEmail($email) : void
    {
        $this->email = $email;
    }
}