<script>
    window.addEventListener("DOMContentLoaded", function (event) {
        window.addEventListener("scroll", function(event) {
            if (document.body.scrollTop > 80
            || document.documentElement.scrollTop > 80) {
                document.querySelector(".navigation").style.backgroundColor = "rgba(255, 255, 255, 0.9);";
                document.querySelector(".navigation").style.backdropFilter = "blur(10px)";
            } else {
                document.querySelector(".navigation").style.backgroundColor = "transparent";
            }
        });
    });
</script>

<header>
    <nav class="navigation">
        <a class="logo" href="/">
            <div class="logotype">
                <svg version="1.1" id="logotype-logo-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 125.091 125.092" style="enable-background:new 0 0 125.091 125.092;" xml:space="preserve"><g><path d="M98.064,16.396c-1.301-1.2-3-1.9-4.801-1.9h-61.5c-1.8,0-3.5,0.7-4.8,1.9l-24.8,23.6c-2.8,2.7-2.9,7.1-0.2,9.9l55.5,58.5 c1.3,1.399,3.2,2.199,5.1,2.199c1.899,0,3.8-0.8,5.1-2.199l55.5-58.5c2.7-2.8,2.5-7.2-0.2-9.9L98.064,16.396z M106.064,47.496 l-38.4,40.5c-1.9,2-5.2,0.6-5.2-2.1v-54.5c0-1.7,1.3-3,3-3h23.7c0.8,0,1.5,0.3,2.1,0.8l14.7,14 C107.164,44.396,107.164,46.296,106.064,47.496z"></path></g></svg>
            </div>
            <div>
                <h1>Catalyst</h1>
                <p>Agency</p>
            </div>
        </a>

        <div class="auth-buttons">
            <?php if (!isset($_SESSION["userData"])) { ?>
                <a class="link-button" href="/auth"><?= $GLOBALS["locale"]["navigationBar"]["authButton"] ?></a>
                <a class="link-button outlined" href="/register"><?= $GLOBALS["locale"]["navigationBar"]["joinButton"] ?></a>
            <?php } else { ?>
                <div class="profile-block">
                    <a href="/user">
                        <img src="/api/avatar?userid=<?= unserialize($_SESSION["userData"])->getId(); ?>">
                        <div><?= unserialize($_SESSION["userData"])->getUsername(); ?></div>
                    </a>

                    <div class="user-menu">
                        <ul>
                            <li class="logout">
                                <a href="/user/logout">
                                    <svg width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none"><path fill="#000000" fill-rule="evenodd" d="M10.138 1.815A3 3 0 0 1 14 4.688v14.624a3 3 0 0 1-3.862 2.873l-6-1.8A3 3 0 0 1 2 17.512V6.488a3 3 0 0 1 2.138-2.873l6-1.8zM15 4a1 1 0 0 1 1-1h3a3 3 0 0 1 3 3v1a1 1 0 1 1-2 0V6a1 1 0 0 0-1-1h-3a1 1 0 0 1-1-1zm6 12a1 1 0 0 1 1 1v1a3 3 0 0 1-3 3h-3a1 1 0 1 1 0-2h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1zM9 11a1 1 0 1 0 0 2h.001a1 1 0 1 0 0-2H9z" clip-rule="evenodd"/></svg>
                                    <div><?= $GLOBALS["locale"]["userMenu"]["logout"] ?></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
    </nav>
</header>