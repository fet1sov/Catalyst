<?php

if (isset($_SESSION["userData"]))
{
    header("Location: /user");
    die();
}

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    if ($_POST["password"] == $_POST["repeatpassword"])
    {
        try {
            new User(0, [
                "username" => $_POST["username"],
                "password" => $_POST["password"],
                "company" => isset($_POST["company"]) ? $_POST["company"] : "",
                "email" => $_POST["email"],
            ]);
        } catch (mysqli_sql_exception $databaseException) {
            Renderer::includeTemplate("frontend/components/layout.php", [
                "layout_path" => ROUTE_ROOT . "register/register.view.php",
                "layout_data" => [
                    "error_message" => [
                        "message" => $GLOBALS["locale"]["errors"]["alreadyRegistered"]
                    ]
                ]
            ]);

            exit();
        }

        header("Location: /auth");
        exit();
    } else {
        Renderer::includeTemplate("frontend/components/layout.php", [
            "layout_path" => ROUTE_ROOT . "register/register.view.php",
            "layout_data" => [
                "error_message" => [
                    "message" => $GLOBALS["locale"]["errors"]["notEqualPassword"]
                ]
            ]
        ]);
    }
} else {
    Renderer::includeTemplate("frontend/components/layout.php", [
        "layout_path" => ROUTE_ROOT . "register/register.view.php",
        "layout_data" => []
    ]);
}