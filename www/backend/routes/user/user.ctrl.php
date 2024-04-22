<?php

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    
} else {
    if (isset($params['category']))
    {
        switch($params['category'])
        {
            case "logout": {
                session_destroy();
                header('Location: /');
                break;
            }

            case "settings": {
                Renderer::includeTemplate("frontend/components/layout.php", [
                    "layout_path" => ROUTE_ROOT . "user/user.view.php",
                    "layout_data" => [
                        "category" => $params['category'],
                        "footerShow" => false
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
}