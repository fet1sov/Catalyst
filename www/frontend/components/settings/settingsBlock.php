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

<script>
    let avatarPreviews = {
        big: null,
    };

    function previewProfilePicture() {
        event.stopPropagation();
        event.preventDefault();
        const fileList = event.dataTransfer.files;

        let reader = new FileReader();

        if (fileList[0].type === "image/png" ||
            fileList[0].type === "image/jpeg" ||
            fileList[0].type === "image/gif") {
            avatarFile = fileList[0];

            avatarPreviews.big.src = URL.createObjectURL(fileList[0]);
        }
    }

    window.addEventListener("DOMContentLoaded", function() {
        avatarPreviews.big = document.querySelector("img#bigAvatarPic");

        const avatarDragZone = document.querySelector("div#avatarDragZone");
        avatarDragZone.addEventListener('dragover', (event) => {
            event.stopPropagation();
            event.preventDefault();
            event.dataTransfer.dropEffect = 'copy';
        });

        avatarDragZone.addEventListener('drop', this.previewProfilePicture);

        const avatarUploadButton = document.querySelector("div#avatarUploadButton");
        avatarUploadButton.addEventListener("click", function() {
            let input = document.createElement('input');
            input.type = 'file';
            input.onchange = _this => {
                let files = Array.from(input.files);
                if (files[0].type === "image/png" ||
                    files[0].type === "image/jpeg" ||
                    files[0].type === "image/gif") {
                    avatarFile = files[0];

                    avatarPreviews.big.src = URL.createObjectURL(files[0]);
                }
            };
            input.click();
        });
    });
</script>

<div class="settings-component">
    <div class="settings-section-block">
        <div>
            <div id="avatarDragZone" class="avatar-block">
                <img id="bigAvatarPic" alt="Small avatar preview" class="avatar-preview" src="../../api/avatar?userid=<?= unserialize($_SESSION["userData"])->getId(); ?>">
                <div id="avatarUploadButton" class="round-button upload-button">
                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_iconCarrier"> <g fill="none" fill-rule="evenodd"> <path d="m0 0h32v32h-32z"></path> <path d="m13.4972619-.65685425h4c1.1045695 0 2 .8954305 2 2v23.66314045c0 .6440327-.1555097 1.2785431-.4533088 1.8495895l-3.0006899 5.7539905c-.153225.2938175-.5156245.4077902-.8094421.2545652-.1127518-.0587998-.2039066-.1519019-.2603101-.2658713l-3.0612398-6.1855586c-.2729885-.5516022-.4150093-1.1587586-.4150093-1.7742159v-23.29563985c0-1.1045695.8954305-2 2-2z" fill="#ffffff" transform="matrix(.70710678 .70710678 -.70710678 .70710678 16.206305 -6.125481)"></path> </g> </g></svg>
                </div>
            </div>

            <p><strong><?= $GLOBALS["locale"]["userPage"]["settings"]["avatar"]["placeholder"] ?></strong></p>
        </div>

        <div style="margin-top: 20px;">
            <div class="settings-row-header">
                <div class="tiny-icon">
                    <svg fill="#000000" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>user</title> <path d="M4 28q0 0.832 0.576 1.44t1.44 0.576h20q0.8 0 1.408-0.576t0.576-1.44q0-1.44-0.672-2.912t-1.76-2.624-2.496-2.144-2.88-1.504q1.76-1.088 2.784-2.912t1.024-3.904v-1.984q0-3.328-2.336-5.664t-5.664-2.336-5.664 2.336-2.336 5.664v1.984q0 2.112 1.024 3.904t2.784 2.912q-1.504 0.544-2.88 1.504t-2.496 2.144-1.76 2.624-0.672 2.912z"></path> </g></svg>
                </div>

                <h2>Персональная информация</h2>
            </div>

            <input style="display: none;" name="avatarFile" id="avatarFile" type="file">

            <div class="settings-row">
                <label for="email"><?= $GLOBALS["locale"]["userPage"]["settings"]["personalInfomation"]["email"]["placeholder"] ?></label>
                <input id="email" placeholder="<?= $GLOBALS["locale"]["userPage"]["settings"]["personalInfomation"]["email"]["placeholder"] ?>" name="email" value="<?= $userData["email"] ?>">
            </div>

            <div class="settings-row">
                <label for="company"><?= $GLOBALS["locale"]["userPage"]["settings"]["personalInfomation"]["companyName"]["placeholder"] ?></label>
                <input id="company" placeholder="<?= $GLOBALS["locale"]["userPage"]["settings"]["personalInfomation"]["companyName"]["placeholder"] ?>" name="company" value="<?= $userData["company"] ?>">
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
