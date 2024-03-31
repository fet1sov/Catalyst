<?php

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    
} else {
    Renderer::includeTemplate("layout.php", [
        "layout_path" => "auth/register_page.php",
        "layout_data" => []
    ]);
}