<link href="_styles/_css/index.css" rel="stylesheet"/>

<div class="container">
    <section>
        <div class="description-block">
            <h2>
                <?= $GLOBALS["locale"]["agencyDescription"]["mainDescription"] ?>
                <span class="red-text bold-text">
                    Catalyst
                </span>
            </h2>

            <div class="secondary-description">
                <p><?= $GLOBALS["locale"]["agencyDescription"]["secondaryDescription"] ?></p>
                <a href="#aboutus" class="link-button"><?= $GLOBALS["locale"]["moreButton"] ?></a>
            </div>
        </div>
    </section>

    <section>
        <a name="aboutus"></a>
        <div class="description-block offer-block">
            <h2>
                <?= $GLOBALS["locale"]["aboutusDescription"]["aboutusBlockName"] ?>
            </h2>

            <div class="offer-block">
            <h3>
                <?= $GLOBALS["locale"]["aboutusDescription"]["aboutusmainDescription1"] ?>
            </h3>
            <p>
            <?= $GLOBALS["locale"]["aboutusDescription"]["aboutussecondDescription1"] ?>
            </p>
            <h3>
                <?= $GLOBALS["locale"]["aboutusDescription"]["aboutusmainDescription2"] ?>
            </h3>
            <p>
            <?= $GLOBALS["locale"]["aboutusDescription"]["aboutussecondDescription2"] ?>
            </p>
            <h3>
                <?= $GLOBALS["locale"]["aboutusDescriptionn"]["aboutusmainDescription3"] ?>
            </h3>
            <p>
            <?= $GLOBALS["locale"]["aboutusDescription"]["aboutussecondDescription3"] ?>
            </p>
            <h3>
                <?= $GLOBALS["locale"]["aboutusDescription"]["aboutusmainDescription4"] ?>
            </h3>
            <p>
            <?= $GLOBALS["locale"]["aboutusDescription"]["aboutussecondDescription4"] ?>
            </p>
            <h3>
                <?= $GLOBALS["locale"]["aboutusDescription"]["aboutusmainDescription5"] ?>
            </h3>
            <p>
            <?= $GLOBALS["locale"]["aboutusDescription"]["aboutussecondDescription5"] ?>
            </p>
            </div>
        </div>
    </section>

    <section>
        <a name="form"></a>
        <div class="description-block offer-block" id="contactForm">
            <div>
                <h2>
                    <?= $GLOBALS["locale"]["agencyDescription"]["formBlockName"] ?>
                </h2>
            </div>
            <div>
            </div>    
            <div>
                <form class="primary-form" method="POST" action="/register">
                    <input type="text" name="name" placeholder="<?= $GLOBALS["locale"]["placeholders"]["name"] ?>">
                    <input type="text" name="company" placeholder="<?= $GLOBALS["locale"]["placeholders"]["company"] ?>">
                    <input type="email" name="email" placeholder="<?= $GLOBALS["locale"]["placeholders"]["email"] ?>">

                    <button class="button-primary button-secondary"><?= $GLOBALS["locale"]["placeholders"]["contactButton"] ?></button>
                </form>
            </div>
        </div>
    </section>
</div>