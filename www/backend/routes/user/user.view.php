<link href="_styles/_css/user.css" rel="stylesheet" />

<style>
    section.user-info {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    div#profileBlock {
        display: flex;
        flex-direction: row;
    }

    div#profileBlock div#appInfo h2 {
        margin-right: 10px;
        vertical-align: middle;
    }

    div#profileBlock div#appInfo .buttons-block {
        display: flex;
        flex-direction: row;

        align-items: center;
    }

    div#profileBlock .small-primary-button {
        width: unset;
        padding: 5px;
    }

    div#profileBlock div.lk-block {
        margin: 20px;
    }

    div#profileBlock div.lk-block {
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

    div#profileBlock div.lk-block {
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

    div.settings-section-block {
        padding: 20px;
        border-radius: 10px;

        box-shadow: 0px 1px 23px 0px rgba(34, 60, 80, 0.2);
    }

    @media (max-width: 700px) {
        div#profileBlock {
            flex-direction: column;
        }

        div#profileBlock div.lk-block {
            margin: 20px 0 0 0;
        }
    }
</style>

<script>
    window.addEventListener("DOMContentLoaded", function() {
        const profileBlock = document.querySelector("div#profileBlock div#profileInfo");
        const applicationsBlock = document.querySelector("div#profileBlock div#appInfo");
        const welcomeBlock = document.querySelector("div#profileBlock div#welcomeMessage")

        if (profileBlock) {
            setInterval(() => {
                profileBlock.style.display = "block";
                applicationsBlock.style.display = "block";
                welcomeBlock.remove();
            }, 2000);
        }
    });
</script>

<?php if (isset($category)) {
    switch ($category) {
        case "settings": { ?>
            <style>
                .centerized-block {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                }

                .settings-navigation-block {
                    margin-bottom: 20px;
                }
                
                .settings-navigation-block ul {
                    display: flex;
                    justify-content: center;
                    flex-direction: row;
                }

                .settings-navigation-block ul li {
                    user-select: none;
                    margin-right: 10px;
                }

                .settings-navigation-block ul li:hover {
                    color: var(--primary-color-03);
                }

                section {
                    height: unset;
                    padding-top: 100px;
                }
            </style>

            <form method="post" enctype="multipart/form-data">
                <section class="centerized-block">
                    <div class="settings-navigation-block">
                        <ul>
                            <?php foreach($GLOBALS["locale"]["userPage"]["settings"]["settingsNavigation"] as $settingKey => $settingSection) { ?>
                                <li icon="<?= $settingKey ?>">
                                    <?= $settingSection ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <?php
                    Renderer::includeTemplate("frontend/components/settings/settingsBlock.php", [
                        "messageUpdate" => isset($messageUpdate) ? $messageUpdate : false,
                        "userData" => $userData
                    ]);
                    break;
                    ?>
                </section>
            </form>
        <?php
        } 

        case "application": { ?>
        <section>
        <?php if ($_SERVER["REQUEST_METHOD"] != "POST") { ?>
            <style>
                .application-form {
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0px 1px 23px 0px rgba(34, 60, 80, 0.3);
                }

                .buttons-block {
                    display: flex;
                    flex-direction: row;
                    justify-content: space-between;
                }
            </style>

            <form class="application-form" action="/user/application" method="post" >
                <h2><?= $GLOBALS["locale"]["sections"]["applicationconfirm"]["title"] ?></h2>
                <p><?= $GLOBALS["locale"]["sections"]["applicationconfirm"]["text"] ?></p>

                <div class="buttons-block">
                    <button class="small-primary-button"><?= $GLOBALS["locale"]["buttons"]["confirm"] ?></button>
                    <div style="width:100px;"></div>
                    <button class="small-primary-button"><?= $GLOBALS["locale"]["buttons"]["cancel"] ?></button>
                </div>
            </form>
        <?php } else { ?>
            
        <?php } ?>
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
                <? } else if ($time >= "12" && $time < "19") { ?>
                    <h2><?= $GLOBALS["locale"]["userPage"]["greetings"]["goodday"] ?><?= unserialize($_SESSION["userData"])->getUsername(); ?></h2>
                <? } else if ($time >= "19") { ?>
                    <h2><?= $GLOBALS["locale"]["userPage"]["greetings"]["goodnight"] ?><?= unserialize($_SESSION["userData"])->getUsername(); ?></h2>
                <? } ?>
            </div>

            <div id="profileInfo" class="lk-block" style="display: none;">
                <h2><?= $GLOBALS["locale"]["titles"]["profileTitle"] ?></h2>
                <div class="profile-block">
                    <img class="small-avatar" style="width: 48px; height: 48px;" src="/api/avatar?userid=<?= unserialize($_SESSION["userData"])->getId(); ?>">
                    <div>
                        <div style="font-weight: bold;"><?= unserialize($_SESSION["userData"])->getUsername(); ?></div>
                        <div style="font-size: 12px; color: var(--secondary-color-02);"><?= unserialize($_SESSION["userData"])->getEmail(); ?></div>
                    </div>
                </div>
            </div>

            <div id="appInfo" class="lk-block" style="display: none;">
                <div class="buttons-block">
                    <h2 style="margin-bottom: 0; align-items: center;"><?= $GLOBALS["locale"]["titles"]["applicationsTitle"] ?></h2>
                    <a href="/user/application" class="small-primary-button">
                        <svg viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>plus-circle</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-466.000000, -1089.000000)" fill="#ffffff"> <path d="M488,1106 L483,1106 L483,1111 C483,1111.55 482.553,1112 482,1112 C481.447,1112 481,1111.55 481,1111 L481,1106 L476,1106 C475.447,1106 475,1105.55 475,1105 C475,1104.45 475.447,1104 476,1104 L481,1104 L481,1099 C481,1098.45 481.447,1098 482,1098 C482.553,1098 483,1098.45 483,1099 L483,1104 L488,1104 C488.553,1104 489,1104.45 489,1105 C489,1105.55 488.553,1106 488,1106 L488,1106 Z M482,1089 C473.163,1089 466,1096.16 466,1105 C466,1113.84 473.163,1121 482,1121 C490.837,1121 498,1113.84 498,1105 C498,1096.16 490.837,1089 482,1089 L482,1089 Z" id="plus-circle" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg>
                        <p><?= $GLOBALS["locale"]["userPage"]["account"]["createApplication"] ?></p>
                    </a>
                </div>
                
                <div>
                    <table>
                        <tr>
                            <th><?= $GLOBALS["locale"]["userPage"]["account"]["appTable"]["id"] ?></th>
                            <th><?= $GLOBALS["locale"]["userPage"]["account"]["appTable"]["manager"] ?></th>
                            <th><?= $GLOBALS["locale"]["userPage"]["account"]["appTable"]["status"] ?></th>
                            <th><?= $GLOBALS["locale"]["userPage"]["account"]["appTable"]["date"] ?></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <section>
<?php } ?>