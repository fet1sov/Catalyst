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
                                    <a href="/user/settings?category=<?= $settingKey ?>"><?= $settingSection ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <?php 
                    if (isset($_GET["category"])) {
                        switch ($_GET["category"]) { 
                            case "security": { ?>
                                <?php
                                Renderer::includeTemplate("frontend/components/settings/securityBlock.php", [
                                    "messageUpdate" => isset($messageUpdate) ? $messageUpdate : false,
                                ]);
                                break;
                                ?>

                        <?php  } 
                            } 
                    } ?>

                    
                    <?php
                    if (!isset($_GET["category"]) || 
                    isset($_GET["category"]) && $_GET["category"] == "profile") {
                    Renderer::includeTemplate("frontend/components/settings/settingsBlock.php", [
                        "messageUpdate" => isset($messageUpdate) ? $messageUpdate : false,
                        "userData" => $userData
                    ]);
                    }

                    break;
                    ?>
                </section>
            </form>
        <?php
        } 

        case "application": { ?>
        <section>
            <style>
                .application-form {
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0px 1px 23px 0px rgba(34, 60, 80, 0.3);
                }

                .flex-centerized {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }

                .buttons-block {
                    display: flex;
                    flex-direction: row;
                    justify-content: space-between;
                }
            </style>

        <?php if ($_SERVER["REQUEST_METHOD"] == "GET") { 
                if (!isset($applicationData)) {
            ?>
            <form class="application-form" action="/user/application" method="post" >
                <h2><?= $GLOBALS["locale"]["sections"]["applicationconfirm"]["title"] ?></h2>
                <textarea name="application-text" id="application-text" placeholder="<?= $GLOBALS["locale"]["sections"]["applicationconfirm"]["text"] ?>"></textarea>

                <div class="buttons-block">
                    <button class="small-primary-button"><?= $GLOBALS["locale"]["buttons"]["confirm"] ?></button>
                    <div style="width:100px;"></div>
                    <a href="../user" class="small-primary-button"><?= $GLOBALS["locale"]["buttons"]["cancel"] ?></a>
                </div>
            </form>
            <?php } else { ?>
                <style>
                .application-form {
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0px 1px 23px 0px rgba(34, 60, 80, 0.3);
                }

                .flex-centerized {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }

                .collumn-block {
                    display: flex;
                    flex-direction: column;
                }

                .row-block {
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                }

                .info-block {
                    margin-bottom: 20px;
                }
            </style>

            <div class="collumn-block">
                <a href="../user" style="display: flex; align-items: center">
                    <svg width="32" height="32" style="margin: 10px" viewBox="0 -4 28 28" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow-left</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-416.000000, -939.000000)" fill="#000000"> <path d="M443,948 L436,948 L436,950 L443,950 C443.553,950 444,949.553 444,949 C444,948.448 443.553,948 443,948 L443,948 Z M426.657,955.243 C427.047,955.633 427.047,956.267 426.657,956.657 C426.267,957.048 425.633,957.048 425.242,956.657 L418.343,949.758 C418.135,949.549 418.046,949.272 418.06,949 C418.046,948.728 418.135,948.451 418.343,948.243 L425.242,941.344 C425.633,940.953 426.267,940.953 426.657,941.344 C427.047,941.733 427.047,942.367 426.657,942.758 L421.414,948 L436,948 L436,941 C436,939.896 435.104,939 434,939 L418,939 C416.896,939 416,939.896 416,941 L416,957 C416,958.104 416.896,959 418,959 L434,959 C435.104,959 436,958.104 436,957 L436,950 L421.414,950 L426.657,955.243 L426.657,955.243 Z" id="arrow-left" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg>
                    <?= $GLOBALS["locale"]["buttons"]["backtolist"] ?>
                </a>
                <form class="application-form" method="post">
                    <div class="info-block">
                        <strong><?= $GLOBALS["locale"]["userPage"]["applicationInfo"]["manager"] ?></strong>
                        <div class="row-block">
                            <?php if (isset($managerData)) { ?>
                                <img style="width: 32px; height: 32px; border-radius: 10px;" src="../api/avatar?id=<?= $applicationData->authorId ?>">
                            <?php } ?>
                                <p style="margin-left: 10px"><?= isset($managerData["username"]) ? $managerData["username"] : $GLOBALS["locale"]["errors"]["nullField"] ?></p>
                        </div>

                        <strong><?= $GLOBALS["locale"]["userPage"]["applicationInfo"]["status"] ?></strong>
                        <div class="row-block">
                            <?php 
                            $statusInfo = $applicationData->getStatus();
                            if ($statusInfo) { ?>
                                <p style="color: <?= $statusInfo["color"] ?>;"><?= $GLOBALS["locale"]["userPage"]["statuses"][$statusInfo["name"]] ?></p>
                            <?php } else { ?>
                                <p style="color: gray"><?= $GLOBALS["locale"]["errors"]["noStatus"] ?></p>
                            <?php } ?>
                        </div>

                        <div class="info-block">
                            <strong><?= $GLOBALS["locale"]["userPage"]["applicationInfo"]["text"] ?></strong>
                            <textarea name="application-text"><?= $applicationData->text ?></textarea>
                        </div>

                        <div class="row-block">
                            <button name="action" value="edit" style="margin: 10px;" class="small-primary-button"><?= $GLOBALS["locale"]["buttons"]["edit"] ?></button>
                            <button name="action" value="delete"  style="margin: 10px;" class="small-primary-button"><?= $GLOBALS["locale"]["buttons"]["recall"] ?></button>
                        </div>
                    </div>
                </form>
            </div>

            <?php } 
        } else { ?>
            <form class="application-form flex-centerized">
                <svg width="128" height="128" style="margin-bottom: 20px;" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z" fill="#e10000"></path> </g></svg>

                <p><?= $GLOBALS["locale"]["sections"]["applicationconfirm"]["success_message"] ?></p>

                <div class="buttons-block" style="margin-top: 10px;">
                    <a href="../user" class="small-primary-button"><?= $GLOBALS["locale"]["buttons"]["continue"] ?></a>
                </div>
            </form>
        <?php } ?>
        </section>
        <?php 
        }
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

            <div id="profileInfo" class="lk-block" style="display: none; height: 150px;">
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
                            <th style="width: 80px"></th>
                        </tr>

                        <?php
                        foreach ($applications as $application) {
                        ?>
                        <tr>
                            <td><?= $application["id"] ?></td>
                            <td><?= $application["user_manager"] ? $application["user_manager"] : $GLOBALS["locale"]["errors"]["nullField"] ?></td>
                            <td><?= $application["status_name"] ? $GLOBALS["locale"]["userPage"]["statuses"][$application["status_name"]] : $GLOBALS["locale"]["errors"]["noStatus"] ?></td>
                            <td><?= date("d.m.Y", $application["creation_date"]) ?></td>
                            <td><a class="small-primary-button" href="/user/application?id=<?= $application["id"] ?>"><?= $GLOBALS["locale"]["buttons"]["view"] ?></a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    <section>
<?php } ?>