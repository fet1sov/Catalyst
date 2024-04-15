<?php
    Renderer::includeTemplate("frontend/components/cubeback.php", []);
?>

<link href="_styles/_css/auth.css" rel="stylesheet" />

<section>
    <form class="secondary-form" method="post">
        <div class="title"><?= $GLOBALS["locale"]["titles"]["authorization"] ?></div>

        <input type="text" name="username" placeholder="<?= $GLOBALS["locale"]["placeholders"]["login"] ?>">
        <input type="password" name="password" placeholder="<?= $GLOBALS["locale"]["placeholders"]["password"] ?>">

        <? if (isset($error_message)) { ?>
            <div class="error-message"><?= $error_message["message"] ?></div>
        <? } ?>

        <input class="button-primary" type="submit" value="<?= $GLOBALS["locale"]["navigationBar"]["authButton"] ?>">
    </form>
</section>