<?php

$applications = Application::getFullList();

Renderer::includeTemplate("frontend/components/layout.php", [
    "layout_path" => ROUTE_ROOT . "admin/admin.view.php",
    "layout_data" => [
        "footerShow" => true,
        "applications" => $applications
    ]
]);