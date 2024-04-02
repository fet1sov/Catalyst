<?php

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    if ($_POST["password"] == $_POST["repeatpassword"])
    {
        $_SESSION["UserData"] = new User(0, [
            "username" => $_POST["username"],
            "password" => $_POST["password"],
            "company" => $_POST["company"],
            "email" => $_POST["email"],
        ]);

        var_dump($_SESSION["UserData"]);
    } else {
        Renderer::includeTemplate("layout.php", [
            "layout_path" => "auth/register_page.php",
            "layout_data" => []
        ]);
    }
} else {
    Renderer::includeTemplate("layout.php", [
        "layout_path" => "auth/register_page.php",
        "layout_data" => []
    ]);
}