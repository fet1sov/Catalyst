<?php

class Application extends DatabaseEntity {
    public $id = 0;
    public $authorName = "";
    public $managerName = "";

    public function __construct($id = 0, $applicationData = array()) {
        $this->id = $id;

        if ($id >= 1)
        {
            $stmt = $GLOBALS["dbAdapter"]->prepare("SELECT COUNT(`id`) FROM `application` WHERE `id`=?");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows() >= 1)
            {
                $stmt = $GLOBALS["dbAdapter"]->prepare("SELECT * FROM `user` WHERE `id`=?");
                $stmt->bind_param('i', $id);
                $stmt->execute();

                $applicationRes = $stmt->get_result();
                $applicationRow = $applicationRes->fetch_array(MYSQLI_ASSOC);

            } else {
                //if (!count($userData))
                //{
                    $createRowFlag = true;
                //}
            }
        } else {
            $createRowFlag = true;
        }

        if ($createRowFlag)
        {
            

            $this->id = $GLOBALS["dbAdapter"]->insert_id;
        }
    }

    public static function getFullList() {
        $stmt = $GLOBALS["dbAdapter"]->prepare("SELECT * FROM `applications` INNER JOIN `application_statuses` ON `applications`.`status` = `application_statuses`.`id`");
        $stmt->execute();

        $applicationsResult = $stmt->get_result();
        return $applicationsResult->fetch_array(MYSQLI_ASSOC);
    }

    public function saveData() : void
    {
        
    }
}