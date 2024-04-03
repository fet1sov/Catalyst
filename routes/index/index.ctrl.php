<?php
Renderer::includeTemplate("frontend/components/layout.php", [
    "layout_path" => "routes/index/index.view.php",
    "layout_data" => [
        "footerShow" => true,
    ]
]);