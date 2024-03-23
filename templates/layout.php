<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
        Renderer::includeTemplate("elems/head.php");
    ?>
</head>

<body>
    <?php
        Renderer::includeTemplate($layout_path, $layout_data);
    ?>
</body>

<footer>
    <?php
        Renderer::includeTemplate("elems/footer.php");
    ?>
</footer>

</html>

