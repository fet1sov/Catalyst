<link href="_styles/_css/auth.css" rel="stylesheet" />

<section>
    <form class="secondary-form" method="post">
        <input type="text" placeholder="<?= $GLOBALS["locale"]["placeholders"]["login"] ?>">
        <input type="text" placeholder="<?= $GLOBALS["locale"]["placeholders"]["password"] ?>">

        <input type="submit" value="<?= $GLOBALS["locale"]["navigationBar"]["authButton"] ?>">
    </form>
</section>