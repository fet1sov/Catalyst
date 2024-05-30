<section>

<?php if (!isset($category)) { ?>
    <table align="center" >
            <tr>
                <th><?= $GLOBALS["locale"]["userPage"]["account"]["appTable"]["id"] ?></th>
                <th><?= $GLOBALS["locale"]["userPage"]["account"]["appTable"]["author"] ?></th>
                <th><?= $GLOBALS["locale"]["userPage"]["account"]["appTable"]["manager"] ?></th>
                <th><?= $GLOBALS["locale"]["userPage"]["account"]["appTable"]["status"] ?></th>
                <th><?= $GLOBALS["locale"]["userPage"]["account"]["appTable"]["date"] ?></th>
                <th style="width: 80px"></th>
            </tr>

            <?php
            if ($applications)
            { 
                foreach ($applications as $application) { ?>
            <tr> <td><?= $application["id"] ?></td> <td><img style="width: 32px; height: 32px; border-radius: 10px;" src="/api/avatar?userid=<?= $application["author_id"] ?>"> <?= $application["user_author"] ? $application["user_author"] : $GLOBALS["locale"]["errors"]["nullField"] ?></td> <td><?= $application["user_manager"] ? $application["user_manager"] : $GLOBALS["locale"]["errors"]["nullField"] ?></td> <td><?= $application["status_name"] ? $GLOBALS["locale"]["userPage"]["statuses"][$application["status_name"]] : $GLOBALS["locale"]["errors"]["noStatus"] ?></td> <td><?= date("d.m.Y", $application["creation_date"]) ?></td> <td><a href="/admin/application?id=<?= $application["id"] ?>" class="small-primary-button"><?= $GLOBALS["locale"]["buttons"]["view"] ?></td>
            </tr>
            <?php 
                }
            } ?>
    </table>
<?php } else {
    switch ($category) {
        case "application": { ?>
            <style>
                .application-form {
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0px 1px 23px 0px rgba(34, 60, 80, 0.3);

                    width: 500px;
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

                button {
                    margin: 10px;
                }

                @media (max-width: 580px) {
                    .application-form {
                        width: 100%;
                    }
                }
            </style>

            <div class="collumn-block">
                <a href="../admin" style="display: flex; align-items: center">
                    <svg width="32" height="32" style="margin: 10px" viewBox="0 -4 28 28" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow-left</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-416.000000, -939.000000)" fill="#000000"> <path d="M443,948 L436,948 L436,950 L443,950 C443.553,950 444,949.553 444,949 C444,948.448 443.553,948 443,948 L443,948 Z M426.657,955.243 C427.047,955.633 427.047,956.267 426.657,956.657 C426.267,957.048 425.633,957.048 425.242,956.657 L418.343,949.758 C418.135,949.549 418.046,949.272 418.06,949 C418.046,948.728 418.135,948.451 418.343,948.243 L425.242,941.344 C425.633,940.953 426.267,940.953 426.657,941.344 C427.047,941.733 427.047,942.367 426.657,942.758 L421.414,948 L436,948 L436,941 C436,939.896 435.104,939 434,939 L418,939 C416.896,939 416,939.896 416,941 L416,957 C416,958.104 416.896,959 418,959 L434,959 C435.104,959 436,958.104 436,957 L436,950 L421.414,950 L426.657,955.243 L426.657,955.243 Z" id="arrow-left" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg>
                    <?= $GLOBALS["locale"]["buttons"]["backtolist"] ?>
                </a>
                <form class="application-form" method="post">
                    <input type="hidden" name="id" value="<?= $applicationData->id ?>">

                    <div class="info-block">

                        <div class="info-block">
                            <strong><?= $GLOBALS["locale"]["userPage"]["applicationInfo"]["author"] ?></strong>
                            <div class="row-block">
                                <img style="width: 32px; height: 32px; border-radius: 10px;" src="../api/avatar?id=<?= $applicationData->authorId ?>">
                                <p style="margin-left: 10px"><?= $authorData["username"] ?></p>
                            </div>
                        </div>

                        <div class="info-block">
                            <strong><?= $GLOBALS["locale"]["userPage"]["applicationInfo"]["contact"] ?></strong>
                            <p><?= $authorData["email"] ?></p>
                        </div>

                        <div class="info-block collumn-block">
                            <strong><?= $GLOBALS["locale"]["userPage"]["applicationInfo"]["assignManager"] ?></strong>
                            <select name="manager" id="manager">
                                <option selected><?= $GLOBALS["locale"]["errors"]["nullField"] ?></option>
                                <?php 
                                foreach ($managerList as $manager) {
                                    if ($applicationData->managerId == $manager["id"]) { ?>
                                        <option value="<?= $manager["id"] ?>" selected><img style="width: 32px; height: 32px; border-radius: 10px;" src="../api/avatar?id=<?= $manager["id"] ?>"><?= $manager["username"] ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $manager["id"] ?>"><img style="width: 32px; height: 32px; border-radius: 10px;" src="../api/avatar?id=<?= $manager["id"] ?>"><?= $manager["username"] ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="info-block collumn-block">
                            <strong><?= $GLOBALS["locale"]["userPage"]["applicationInfo"]["changeStatus"] ?></strong>
                            <select name="statuses" id="statuses">
                                <?php 
                                foreach ($statusList as $status) {
                                    if ($applicationData->status == $status["id"]) { ?>
                                        <option value="<?= $status["id"] ?>" style="color: <?= $status["color"] ?>" selected><?= $GLOBALS["locale"]["userPage"]["statuses"][$status["name"]] ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $status["id"] ?>" style="color: <?= $status["color"] ?>"><?= $GLOBALS["locale"]["userPage"]["statuses"][$status["name"]] ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="info-block">
                        <strong><?= $GLOBALS["locale"]["userPage"]["applicationInfo"]["text"] ?></strong>
                        <p><?= $applicationData->text ?></p>
                    </div>

                    <div class="info-block row-block">
                        <button name="action" value="update" class="small-primary-button"><?= $GLOBALS["locale"]["buttons"]["update"] ?></button>
                        <button name="action" value="cancel" class="small-primary-button"><?= $GLOBALS["locale"]["buttons"]["cancel"] ?></button>
                    </div>
                </form>
            </div>
            
        <?php } ?>
    <?php } ?>
<?php } ?>
</section>