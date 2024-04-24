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
    }
} else {
    Renderer::includeTemplate("frontend/components/layout.php", [
        "layout_path" => ROUTE_ROOT . "user/user.view.php",
        "layout_data" => [
            "footerShow" => false
        ]
    ]);
}
