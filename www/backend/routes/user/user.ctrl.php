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
                    if (isset($_FILES["avatarFile"]))
                    {
                        move_uploaded_file($_FILES["avatarFile"]["tmp_name"], join(DIRECTORY_SEPARATOR, array($_SERVER["DOCUMENT_ROOT"], "data", "uploads", "avatars", unserialize($_SESSION["userData"])->getId() . ".png")));
                    }

                    $userData->setEmail(isset($_POST["email"]) ? $_POST["email"] : $userData->getEmail());
                    $userData->setCompany(isset($_POST["company"]) ? $_POST["company"] : $userData->getCompany());
                    $userData->saveData();

                    Renderer::includeTemplate("frontend/components/layout.php", [
                        "layout_path" => ROUTE_ROOT . "user/user.view.php",
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

                } else {
                    Renderer::includeTemplate("frontend/components/layout.php", [
                        "layout_path" => ROUTE_ROOT . "user/user.view.php",
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
            Renderer::includeTemplate("frontend/components/layout.php", [
                "layout_path" => ROUTE_ROOT . "user/user.view.php",
                "layout_data" => [
                    "category" => $params['category'],
                    "footerShow" => false,
                ]
            ]);
            break;
        }   
    }
} else {
    Renderer::includeTemplate("frontend/components/layout.php", [
        "layout_path" => ROUTE_ROOT . "user/user.view.php",
        "layout_data" => [
            "footerShow" => false
        ]
    ]);
}
