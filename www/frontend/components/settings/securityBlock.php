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

        <div style="margin-top: 20px;">
            <div class="settings-row-header">
                <div class="tiny-icon">
                <svg fill="#000000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M19.753 10.909c-.624-1.707-2.366-2.726-4.661-2.726-.09 0-.176.002-.262.006l-.016-2.063 3.525-.607c.115-.019.133-.119.109-.231-.023-.111-.167-.883-.188-.976-.027-.131-.102-.127-.207-.109-.104.018-3.25.461-3.25.461l-.013-2.078c-.001-.125-.069-.158-.194-.156l-1.025.016c-.105.002-.164.049-.162.148l.033 2.307s-3.061.527-3.144.543c-.084.014-.17.053-.151.143s.19 1.094.208 1.172c.018.08.072.129.188.107l2.924-.504.035 2.018c-1.077.281-1.801.824-2.256 1.303-.768.807-1.207 1.887-1.207 2.963 0 1.586.971 2.529 2.328 2.695 3.162.387 5.119-3.06 5.769-4.715 1.097 1.506.256 4.354-2.094 5.98-.043.029-.098.129-.033.207l.619.756c.08.096.206.059.256.023 2.51-1.73 3.661-4.515 2.869-6.683zm-7.386 3.188c-.966-.121-.944-.914-.944-1.453 0-.773.327-1.58.876-2.156a3.21 3.21 0 0 1 1.229-.799l.082 4.277c-.385.131-.799.185-1.243.131zm2.427-.553l.046-4.109c.084-.004.166-.01.252-.01.773 0 1.494.145 1.885.361.391.217-1.023 2.713-2.183 3.758zm-8.95-7.668a.196.196 0 0 0-.196-.145h-1.95a.194.194 0 0 0-.194.144L.008 16.916c-.017.051-.011.076.062.076h1.733c.075 0 .099-.023.114-.072l1.008-3.318h3.496l1.008 3.318c.016.049.039.072.113.072h1.734c.072 0 .078-.025.062-.076-.014-.05-3.083-9.741-3.494-11.04zm-2.618 6.318l1.447-5.25 1.447 5.25H3.226z"></path></g></svg>
                </div>

                <h2><?= $GLOBALS["locale"]["userPage"]["settings"]["password"]["header02"] ?></h2>
            </div>

            <div class="settings-row">
                <select id="language-input" name="language-input">
                    <option value="en-US" <?= isset($_COOKIE["locale"]) && $_COOKIE["locale"] ? "selected" : "" ?>>English</option>
                    <option value="ru-RU" <?= isset($_COOKIE["locale"]) && $_COOKIE["locale"] ? "selected" : "" ?>>Русский</option>
                </select>
            </div>

            <script>
                window.addEventListener("DOMContentLoaded", function() {
                    const languageInput = document.getElementById("language-input");
                    languageInput.onchange = function() {
                        document.cookie = `locale=${this.value}`;
                    }
                });
            </script>

        </div>

        <div class="settings-buttons-block">
            <button class="small-primary-button"><?= $GLOBALS["locale"]["buttons"]["saveButton"] ?></button>
            <div class="primary-link-button"><?= $GLOBALS["locale"]["buttons"]["discardButton"] ?></div>
        </div>
    </div>
</div>
