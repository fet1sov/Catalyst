<style>
    .settings-component {
        display: flex;
        justify-content: center;
        flex-direction: column;
    }

    .settings-component .avatar-preview {
        border-radius: 10px;
    }

    .settings-component #smallAvatarPic {
        width: 48px;
        height: 48px;
    }

    .settings-component #middleAvatarPic {
        width: 64px;
        height: 64px;
    }

    .settings-component #bigAvatarPic {
        width: 128px;
        height: 128px;
    }

    .settings-component .small-category-block {
        margin-bottom: 10px;
    }

    .settings-component .small-primary-button {
        width: 50%;
    }

    .settings-component .avatar-block {
        display: flex;
        justify-content: center;

        position: relative;
    }

    .settings-component .upload-button {
        position: absolute;

        width: 48px;
        height: 48px;

        top: 65%;
        margin-left: 100px;
    }

    .settings-component .settings-row {
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        margin-top: 10px;
    }

    .settings-component .settings-row input {
        background-color: var(--secondary-color-05);
        outline: none;
    }
    
    .settings-component .settings-row input::placeholder {
        color: var(--secondary-color-02);
    }

    .settings-component .settings-buttons-block {
        margin-top: 30px;

        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .settings-component .message-success {
        animation-name: appearAnimation-X;
        animation-duration: 0.5s;

        display: flex;
        justify-content: center;
        align-items: center;

        color: #00d92f;
        font-weight: bold;
    }

    .settings-component .settings-row-header {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .settings-component .tiny-icon {
        display: flex;
        align-items: center;

        background-color: var(--secondary-color-05);
        padding: 5px;

        border-radius: 5px;
        margin-right: 5px;
    }

    .settings-component .tiny-icon svg {
        width: 32px;
        height: 32px;

        fill: var(--secondary-color-02);
    }
</style>

<div class="settings-component">
    <div class="settings-section-block">
        <div style="margin-top: 20px;">
            <div class="settings-row-header">
                <div class="tiny-icon">
                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#231F20" d="M52,24h-4v-8c0-8.836-7.164-16-16-16S16,7.164,16,16v8h-4c-2.211,0-4,1.789-4,4v32c0,2.211,1.789,4,4,4h40 c2.211,0,4-1.789,4-4V28C56,25.789,54.211,24,52,24z M32,48c-2.211,0-4-1.789-4-4s1.789-4,4-4s4,1.789,4,4S34.211,48,32,48z M40,24 H24v-8c0-4.418,3.582-8,8-8s8,3.582,8,8V24z"></path> </g></svg>        
                </div>

                <h2><?= $GLOBALS["locale"]["userPage"]["settings"]["password"]["header"] ?></h2>
            </div>

            <div class="settings-row">
                <label for="oldPassword"><?= $GLOBALS["locale"]["userPage"]["settings"]["password"]["oldPassword"]["placeholder"] ?></label>
                <input id="oldPassword" placeholder="<?= $GLOBALS["locale"]["userPage"]["settings"]["password"]["oldPassword"]["placeholder"] ?>" name="oldPassword">
            </div>

            <div class="settings-row">
                <label for="newPassword"><?= $GLOBALS["locale"]["userPage"]["settings"]["password"]["newPassword"]["placeholder"] ?></label>
                <input id="newPassword" placeholder="<?= $GLOBALS["locale"]["userPage"]["settings"]["password"]["newPassword"]["placeholder"] ?>" name="newPassword">
            </div>

            <div class="settings-row">
                <label for="repeatPassword"><?= $GLOBALS["locale"]["userPage"]["settings"]["password"]["repeatPassword"]["placeholder"] ?></label>
                <input id="repeatPassword" placeholder="<?= $GLOBALS["locale"]["userPage"]["settings"]["password"]["repeatPassword"]["placeholder"] ?>" name="repeatPassword">
            </div>
        </div>

        <?php if (isset($messageUpdate) && $messageUpdate) { ?>
            <p class="message-success"><?= $GLOBALS["locale"]["success"]["settings"]["profileSettings"] ?></p>
        <?php } ?>

        <div class="settings-buttons-block">
            <button class="small-primary-button"><?= $GLOBALS["locale"]["buttons"]["saveButton"] ?></button>
            <div class="primary-link-button"><?= $GLOBALS["locale"]["buttons"]["discardButton"] ?></div>
        </div>
    </div>
</div>
