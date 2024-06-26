<?php

if (isset($_SESSION["userData"]))
{
    header("Location: /user");
    die();
}

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    $userData = User::searchDataByField($_POST["username"], "username");

    if ($userData && count($userData))
    {
        if (md5($_POST["password"]) == $userData["password"])
        {
            $_SESSION["userData"] = serialize(new User($userData["id"]));
            header("Location: /user");
        } else {
            Renderer::includeTemplate("frontend/components/layout.php", [
                "layout_path" => FRONTEND_VIEWS . "auth.view.php",
                "layout_data" => [
                    "error_message" => [
                        "message" => $GLOBALS["locale"]["errors"]["wrongAuthData"]
                    ]
                ]
            ]);
        }
    } else {
        Renderer::includeTemplate("frontend/components/layout.php", [
            "layout_path" => FRONTEND_VIEWS . "auth.view.php",
            "layout_data" => [
                "error_message" => [
                    "message" => $GLOBALS["locale"]["errors"]["wrongAuthData"]
                ]
            ]
        ]);
    }
} else {
    Renderer::includeTemplate("frontend/components/layout.php", [
        "layout_path" => FRONTEND_VIEWS . "auth.view.php",
        "layout_data" => []
    ]);
}
