<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
        Renderer::includeTemplate($GLOBALS["wtfFrontend"]["componentsPath"] . "elems/head.php");
    ?>
</head>

<body>
    <?php
        Renderer::includeTemplate($GLOBALS["wtfFrontend"]["componentsPath"] . "elems/header.php", []);
    ?>
    
    <?php
        Renderer::includeTemplate($layout_path, $layout_data);
    ?>
</body>

<footer>
    <?php
        isset($layout_data) && $layout_data["footerShow"] ? Renderer::includeTemplate($GLOBALS["wtfFrontend"]["componentsPath"] . "elems/footer.php") : "";
    ?>
</footer>

</html>

