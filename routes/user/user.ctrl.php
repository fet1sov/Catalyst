<?php

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    
} else {
    Renderer::includeTemplate("frontend/components/layout.php", [
        "layout_path" => "routes/user/user.view.php",
        "layout_data" => [
            
        ]
    ]);
}
