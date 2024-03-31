<?php

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    
} else {
    Renderer::includeTemplate("layout.php", [
        "layout_path" => "auth/auth_page.php",
        "layout_data" => []
    ]);
}
