<?php

if (!isset($_SESSION["userData"])) {
    header('Location: /');
}

if (isset($params['category'])) {
    switch ($params['category']) {
        case "logout": {
                session_destroy();
                header('Location: /');
                break;
            }

        case "settings": {
                $userData = unserialize($_SESSION["userData"]);

                if ($_SERVER['REQUEST_METHOD'] == "POST") { 

                    if (!isset($_GET["category"]) || 
                    isset($_GET["category"]) && $_GET == "profile")
                    {
                        if (isset($_FILES["avatarFile"]))
                        {
                            move_uploaded_file($_FILES["avatarFile"]["tmp_name"], join(DIRECTORY_SEPARATOR, array($_SERVER["DOCUMENT_ROOT"], "data", "uploads", "avatars", unserialize($_SESSION["userData"])->getId() . ".png")));
                        }

                        $userData->setEmail(isset($_POST["email"]) ? $_POST["email"] : $userData->getEmail());
                        $userData->setCompany(isset($_POST["company"]) ? $_POST["company"] : $userData->getCompany());
                        $userData->saveData();

                        Renderer::includeTemplate("frontend/components/layout.php", [
                            "layout_path" => FRONTEND_VIEWS . "user.view.php",
                            "layout_data" => [
                                "category" => $params['category'],
                                "messageUpdate" => true,
                                "footerShow" => false,
                                "userData" => [
                                    "email" => $userData->getEmail(),
                                    "company" => $userData->getCompany()
                                ]
                            ]
                        ]);
                    } else if (isset($_GET["category"]) && $_GET["category"] == "security") {
                        $messageUpdate = false;

                        if (md5($_POST["oldPassword"]) == $userData->password)
                        {
                            if ($_POST["newPassword"] == $_POST["repeatPassword"])
                            {
                                $userData->setPassword(isset($_POST["newPassword"]) ? md5($_POST["newPassword"]) : $userData->getPassword());
                                $userData->saveData();

                                $messageUpdate = true;

                                session_destroy();
                            }
                        }

                        Renderer::includeTemplate("frontend/components/layout.php", [
                            "layout_path" => FRONTEND_VIEWS . "user.view.php",
                            "layout_data" => [
                                "category" => $params['category'],
                                "messageUpdate" => $messageUpdate,
                                "footerShow" => false,
                            ]
                        ]);
                    }
                } else {
                    Renderer::includeTemplate("frontend/components/layout.php", [
                        "layout_path" => FRONTEND_VIEWS . "user.view.php",
                        "layout_data" => [
                            "category" => $params['category'],
                            "footerShow" => false,
                            "userData" => [
                                "email" => $userData->getEmail(),
                                "company" => $userData->getCompany()
                            ]
                        ]
                    ]);
                }
                break;
            }
        
        case "application": {

            if (!isset($_GET["id"]))
            {
                if ($_SERVER["REQUEST_METHOD"] == "POST"
                && isset($_SESSION["userData"]))
                {
                    $userData = unserialize($_SESSION["userData"]);

                    $application = new Application(0, [
                        "author_id" => $userData->id,
                        "creation_date" => time(),
                        "text" => htmlspecialchars($_POST["application-text"])
                    ]);

                    header("Location: /user");
                } else {
                    Renderer::includeTemplate("frontend/components/layout.php", [
                        "layout_path" => FRONTEND_VIEWS . "user.view.php",
                        "layout_data" => [
                            "category" => $params['category'],
                            "footerShow" => false,
                        ]
                    ]);
                }
            } else {
                $application = new Application(intval($_GET["id"]));

                if ($_SERVER['REQUEST_METHOD'] == "GET")
                {
                    Renderer::includeTemplate("frontend/components/layout.php", [
                        "layout_path" => FRONTEND_VIEWS . "user.view.php",
                        "layout_data" => [
                            "category" => $params['category'],
                            "applicationData" => $application,
                            "managerData" => $application->getManagerInfo(),
                            "footerShow" => false,
                        ]
                    ]);
                } else {
                    if (isset($_POST["action"])
                    && $_POST["action"] == "edit")
                    {
                        $application->text = $_POST["application-text"];
                        $application->saveData();

                        $application = new Application(intval($_GET["id"]));

                        Renderer::includeTemplate("frontend/components/layout.php", [
                            "layout_path" => FRONTEND_VIEWS . "user.view.php",
                            "layout_data" => [
                                "category" => $params['category'],
                                "applicationData" => $application,
                                "managerData" => $application->getManagerInfo(),
                                "footerShow" => false,
                            ]
                        ]);   
                    } else if ($_POST["action"] == "delete") {
                        $application->remove();
                        header("Location: /user");
                    }
                }
            }
            
            break;
        }   
    }
} else {
    Renderer::includeTemplate("frontend/components/layout.php", [
        "layout_path" => FRONTEND_VIEWS . "user.view.php",
        "layout_data" => [
            "applications" => Application::fetchByUserId(unserialize($_SESSION["userData"])->id),
            "footerShow" => false
        ]
    ]);
}
