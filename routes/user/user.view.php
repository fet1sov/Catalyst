<link href="_styles/_css/user.css" rel="stylesheet"/>

<section class="user-info">
    <div>
        <h2><?= $GLOBALS["locale"]["titles"]["profileTitle"] ?> </h2>
        <div><?= unserialize($_SESSION["userData"])->getUsername(); ?></div>
    </div>
<section>