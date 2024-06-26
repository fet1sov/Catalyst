<?php
Renderer::includeTemplate("frontend/components/layout.php", [
    "layout_path" => FRONTEND_VIEWS . "index.view.php",
    "layout_data" => [
        "footerShow" => true,
    ]
]);