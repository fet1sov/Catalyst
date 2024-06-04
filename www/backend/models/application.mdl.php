<?php

/**
*   application.php
*   Entity model of advertisment applications
*
*   @author fet1sov <prodaugust21@gmail.com>
*/
class Application extends DatabaseEntity {
    public $id = 0;
    public $authorId = 0;
    public $managerId = 0;
    public $text = "";
    public $status = 0;

    /**
    * Creates the object of applications
    * If ID will be equal zero - model will create a new row
    * with applicationData inside
    * @example
    * Creating object with a new Application
    * $application = new Application(0, [
    *     "author_id" => "1",
    *     "manager_id" => null,
    *     "text" => "EXAMPLE TEXT",
    *     "status" => "1"
    * ]);
    *
    * Creating object with a existing Application
    * $application = new Application(5);
    */
    public function __construct($id = 0, $applicationData = array()) {
        $this->id = $id;

        $createRowFlag = false;
        if ($id >= 1)
        {
            $stmt = $GLOBALS["dbAdapter"]->prepare("SELECT COUNT(`id`) FROM `applications` WHERE `id`=?");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows() >= 1)
            {
                $stmt = $GLOBALS["dbAdapter"]->prepare("SELECT * FROM `applications` WHERE `applications`.`id`=?");
                $stmt->bind_param('i', $id);
                $stmt->execute();

                $applicationRes = $stmt->get_result();
                $applicationRow = $applicationRes->fetch_array(MYSQLI_ASSOC);

                $this->id = $applicationRow["id"];
                $this->authorId = $applicationRow["author_id"];
                $this->managerId = $applicationRow["manager_id"];
                $this->text = $applicationRow["text"];
                $this->status = $applicationRow["status"];
            } else {
                $createRowFlag = true;
            }
        } else {
            $createRowFlag = true;
        }

        if ($createRowFlag)
        {
            $stmt = $GLOBALS["dbAdapter"]->prepare("INSERT INTO `applications`(`author_id`, `creation_date`, `text`) VALUES (?, ?, ?)");
            $stmt->bind_param(
                'iis',
                $applicationData["author_id"],
                $applicationData["creation_date"],
                $applicationData["text"]
            );
            $stmt->execute();

            $this->id = $GLOBALS["dbAdapter"]->insert_id;
            $this->authorId = $applicationData["author_id"];
            $this->text = $applicationData["text"];
        }
    }

    public static function getFullList() {
        $stmt = $GLOBALS["dbAdapter"]->prepare("SELECT `applications`.*, `user`.`username` AS `user_author`, `manager_user`.`username` AS `user_manager`, `application_statuses`.`name` AS `status_name` FROM `applications` LEFT JOIN `application_statuses` ON `applications`.`status` = `application_statuses`.`id` INNER JOIN `user` ON `applications`.`author_id` = `user`.`id` LEFT JOIN `user` manager_user ON `applications`.`manager_id`=`manager_user`.`id`");
        $stmt->execute();

        $applicationsList = array();

        $applicationsResult = $stmt->get_result();
        while ($row = $applicationsResult->fetch_array(MYSQLI_ASSOC)) {
            array_push($applicationsList, $row);
        }

        return $applicationsList;
    }

    /**
    * Getting user applications by indetifier (id)
    * @param int $userID User ID
    */
    public static function fetchByUserId($userID) {
        $stmt = $GLOBALS["dbAdapter"]->prepare("SELECT `applications`.*, `user`.`username` AS `user_author`, `manager_user`.`username` AS `user_manager`, `application_statuses`.`name` AS `status_name` FROM `applications` LEFT JOIN `application_statuses` ON `applications`.`status` = `application_statuses`.`id` LEFT JOIN `user` ON `applications`.`author_id` = `user`.`id` LEFT JOIN `user` manager_user ON `applications`.`manager_id`=`manager_user`.`id` WHERE `applications`.`author_id`=?");
        $stmt->bind_param('i', $userID);
        $stmt->execute();

        $applicationsList = array();

        $applicationsResult = $stmt->get_result();
        while ($row = $applicationsResult->fetch_array(MYSQLI_ASSOC)) {
            array_push($applicationsList, $row);
        }

        return $applicationsList;
    }

    /**
    * Updates application status by indetifier (id)
    * @param int $statusID Status ID
    */
    public function setStatus($statusID) : void 
    {
        $stmt = $GLOBALS["dbAdapter"]->prepare("UPDATE `applications` SET `status`=? WHERE `id`=?");
        $stmt->bind_param(
            'ii',
            $this->status,
            $this->id
        );
        $stmt->execute();
    }

    /**
    * Getting current status information
    */
    public function getStatus() : ?array {
        $stmt = $GLOBALS["dbAdapter"]->prepare("SELECT * FROM `application_statuses` WHERE `id`=?");
        $stmt->bind_param('i', $this->status);
        $stmt->execute();

        $statusResult = $stmt->get_result();
        return $statusResult->fetch_array(MYSQLI_ASSOC);
    }

    /**
    * Static method which returns
    * All status list
    */
    public static function getStatusList() : ?array
    {
        $stmt = $GLOBALS["dbAdapter"]->prepare("SELECT * FROM `application_statuses`");
        $stmt->execute();

        $statusesList = array();

        $statusResult = $stmt->get_result();
        while ($row = $statusResult->fetch_array(MYSQLI_ASSOC)) {
            array_push($statusesList, $row);
        }

        return $statusesList;
    }

    /**
    * Getting all user data by author indetifier (id)
    */
    public function getAuthorInfo() : ?array {
        $stmt = $GLOBALS["dbAdapter"]->prepare("SELECT * FROM `user` WHERE `id`=?");
        $stmt->bind_param('i', $this->authorId);
        $stmt->execute();

        $userResult = $stmt->get_result();
        return $userResult->fetch_array(MYSQLI_ASSOC);
    }

    /**
    * Getting all user data by manager indetifier (id)
    */
    public function getManagerInfo() : ?array {
        $stmt = $GLOBALS["dbAdapter"]->prepare("SELECT * FROM `user` WHERE `id`=?");
        $stmt->bind_param('i', $this->managerId);
        $stmt->execute();

        $userResult = $stmt->get_result();
        return $userResult->fetch_array(MYSQLI_ASSOC);
    }

    /**
    * Method which updates all attribute of application
    */
    public function saveData() : void
    {
        if ($this->managerId == -1)
        {
            $stmt = $GLOBALS["dbAdapter"]->prepare("UPDATE `applications` SET `author_id`=?, `status`=?, `text`=? WHERE `id`=?");
            $stmt->bind_param(
                'iisi',
                $this->authorId,
                $this->status,
                $this->text,
                $this->id
            );
            $stmt->execute();
        } else {
            $stmt = $GLOBALS["dbAdapter"]->prepare("UPDATE `applications` SET `author_id`=?, `manager_id`=?, `status`=?, `text`=? WHERE `id`=?");
            $stmt->bind_param(
                'iiisi',
                $this->authorId,
                $this->managerId,
                $this->status,
                $this->text,
                $this->id
            );
            $stmt->execute();
        }
    }

    /**
    * Removes the application object from the database
    */
    public function remove() : void
    {
        $stmt = $GLOBALS["dbAdapter"]->prepare("DELETE FROM `applications` WHERE `id`=?");
        $stmt->bind_param(
            'i',
            $this->id
        );
        $stmt->execute();
    }
}
