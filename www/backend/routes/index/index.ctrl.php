<?php
Renderer::includeTemplate("frontend/components/layout.php", [
    "layout_path" => ROUTE_ROOT . "index/index.view.php",
    "layout_data" => [
        "footerShow" => true,
    ]
]);