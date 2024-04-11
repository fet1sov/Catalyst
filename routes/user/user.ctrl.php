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
        }
    } else {
        Renderer::includeTemplate("frontend/components/layout.php", [
            "layout_path" => "routes/user/user.view.php",
            "layout_data" => [
                "footerShow" => false
            ]
        ]);
    }
}
