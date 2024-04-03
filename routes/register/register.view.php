<link href="_styles/_css/auth.css" rel="stylesheet" />

<section>
    <form class="secondary-form" method="post">
        <div class="title"><?= $GLOBALS["locale"]["titles"]["registration"] ?></div>

        <input type="text" name="username" placeholder="<?= $GLOBALS["locale"]["placeholders"]["login"] ?>">
        <input type="email" name="email" placeholder="<?= $GLOBALS["locale"]["placeholders"]["email"] ?>">
        <input type="password" name="password" placeholder="<?= $GLOBALS["locale"]["placeholders"]["password"] ?>">
        <input type="password" name="repeatpassword" placeholder="<?= $GLOBALS["locale"]["placeholders"]["repeatPassword"] ?>">

        <input class="button-primary" type="submit" value="<?= $GLOBALS["locale"]["navigationBar"]["joinButton"] ?>">
    </form>
</section>