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
                    $userData->setCompany(isset($_POST["companyName"]) ? $_POST["companyName"] : $userData->getCompany());
                    $userData->saveData();

                    Renderer::includeTemplate("frontend/components/layout.php", [
                        "layout_path" => ROUTE_ROOT . "user/user.view.php",
                        "layout_data" => [
                            "category" => $params['category'],
                            "message" => [
                                "type" => "success"
                            ],
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
