<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
        Renderer::includeTemplate($GLOBALS["wtfFrontend"]["componentsPath"] . "elems/head.php");
    ?>
</head>

<body>
    <?php
        Renderer::includeTemplate($GLOBALS["wtfFrontend"]["componentsPath"] . "elems/header.php", []);
    ?>
    
    <div class="container">
        <?php
            Renderer::includeTemplate($layout_path, $layout_data);
        ?>
    </div>
</body>

<footer>
    <?php
        isset($layout_data["footerShow"]) && $layout_data["footerShow"] ? Renderer::includeTemplate($GLOBALS["wtfFrontend"]["componentsPath"] . "elems/footer.php") : "";
    ?>
</footer>

</html>

