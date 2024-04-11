<link href="_styles/_css/user.css" rel="stylesheet"/>

<style>
    section.user-info {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    div#profileBlock div#profileInfo {
        padding: 20px;
        border-radius: 10px;

        -webkit-box-shadow: 0px 1px 23px 0px rgba(34, 60, 80, 0.2);
        -moz-box-shadow: 0px 1px 23px 0px rgba(34, 60, 80, 0.2);
        box-shadow: 0px 1px 23px 0px rgba(34, 60, 80, 0.2);
    }

    div#profileBlock div#welcomeMessage h2 {
        font-size: 48px;

        animation-name: appearAnimation-X;
        animation-duration: 0.5s;
    }

    div#profileBlock div#profileInfo {
        animation-name: appearAnimation;
        animation-duration: 0.5s;
    }

    div#profileBlock div.profile-block div {
        display: flex;
        flex-direction: column;
    }

    div#profileBlock div h2 {
        margin-bottom: 20px;
    }
</style>

<script>
    window.addEventListener("DOMContentLoaded", function() {
        const profileBlock = document.querySelector("div#profileBlock div#profileInfo");
        const welcomeBlock = document.querySelector("div#profileBlock div#welcomeMessage")

        setInterval(() => {
            profileBlock.style.display = "block";
            welcomeBlock.remove();
        }, 2000);
    });
</script>

<?php if (isset($category)) { 
        switch($category) { 
            case "settings": { ?>
            <section>
                <form method="post">

                </form>
            </section>
        <?php } 
        }
} else { ?>
    <section class="user-info">
        <div id="profileBlock">
            <div id="welcomeMessage">
                <?
                    $time = date("H");
                ?>

                <? if ($time < "12") { ?>
                    <h2><?= $GLOBALS["locale"]["userPage"]["greetings"]["goodmorning"] ?><?= unserialize($_SESSION["userData"])->getUsername(); ?></h2>
                <? } else if ($time >= "12" && $time < "17") { ?>
                    <h2><?= $GLOBALS["locale"]["userPage"]["greetings"]["goodday"] ?><?= unserialize($_SESSION["userData"])->getUsername(); ?></h2>
                <? } else if ($time >= "19") { ?>
                    <h2><?= $GLOBALS["locale"]["userPage"]["greetings"]["goodnight"] ?><?= unserialize($_SESSION["userData"])->getUsername(); ?></h2>
                <? } ?>
            </div>

            <div id="profileInfo" style="display: none;">
                <h2><?= $GLOBALS["locale"]["titles"]["profileTitle"] ?></h2>
                <div class="profile-block">
                    <img class="small-avatar" style="width: 48px; height: 48px;" src="/api/avatar?userid=<?= unserialize($_SESSION["userData"])->getId(); ?>">
                    <div>
                        <div style="font-weight: bold;"><?= unserialize($_SESSION["userData"])->getUsername(); ?></div>
                        <div style="font-size: 12px; color: var(--secondary-color-02);"><?= unserialize($_SESSION["userData"])->getEmail(); ?></div>
                    </div>
                </div>
            </div>
        </div>
    <section>
<?php } ?>