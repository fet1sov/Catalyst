<?php

Renderer::includeTemplate("frontend/components/layout.php", [
    "layout_path" => FRONTEND_VIEWS . "404.view.php",
    "layout_data" => [
        "footerShow" => false
    ]
]);