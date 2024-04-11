<?php

Renderer::includeTemplate("frontend/components/layout.php", [
    "layout_path" => ROUTE_ROOT . "404/404.view.php",
    "layout_data" => [
        "footerShow" => false
    ]
]);