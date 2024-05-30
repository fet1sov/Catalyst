<?php

if (!isset($_SESSION["userData"])) {
    header('Location: /');
}

$userData = unserialize($_SESSION["userData"]);

if($userData->roleid == NULL 
&& !$userData->getPermissions()["admin_rights"])
{
    header('Location: /');
    die();
}

if (isset($params['category'])) {
    switch ($params['category']) {
        case "application": {
            if ($_SERVER['REQUEST_METHOD'] == 'GET')
            {
                $application = new Application(intval($_GET["id"]));

                Renderer::includeTemplate("frontend/components/layout.php", [
                    "layout_path" => ROUTE_ROOT . "admin/admin.view.php",
                    "layout_data" => [
                        "footerShow" => false,
                        "category" => $params['category'],
                        "applicationData" => $application,
                        "authorData" => $application->getAuthorInfo(),
                        "managerList" => User::getFullList("WHERE `role`.`admin_rights`=1"),
                        "statusList" => Application::getStatusList(),
                    ]
                ]);
            } else {
                $application = new Application(intval($_POST["id"]));

                if ($_POST["action"] == "update")
                {
                    $application->status = intval($_POST["statuses"]);
                    $application->managerId = intval($_POST["manager"]);
                    $application->saveData();

                    $message = $GLOBALS["locale"]["successMessages"]["updatedData"];
                } else {
                    header('Location: /admin');
                    $application->remove();
                }
                

                Renderer::includeTemplate("frontend/components/layout.php", [
                    "layout_path" => ROUTE_ROOT . "admin/admin.view.php",
                    "layout_data" => [
                        "footerShow" => false,
                        "category" => $params['category'],
                        "applicationData" => $application,
                        "authorData" => $application->getAuthorInfo(),
                        "managerList" => User::getFullList("WHERE `role`.`admin_rights`=1"),
                        "statusList" => Application::getStatusList(),
                        "message" => strlen($message) ? $message : ""
                    ]
                ]);
            }
        }
    }
} else {
    Renderer::includeTemplate("frontend/components/layout.php", [
        "layout_path" => ROUTE_ROOT . "admin/admin.view.php",
        "layout_data" => [
            "footerShow" => false,
            "applications" => Application::getFullList()
        ]
    ]);
}