<style>
    section.error-info {
        display: flex;
        flex-direction: column;
    }

    section.error-info h3 {
        color: var(--secondary-color-02);
        font-weight: normal;
    }
</style>

<section class="error-info">
    <h2>404 <?= $GLOBALS["locale"]["errors"]["httpError"]["404"]["message"] ?></h2>
    <h3><?= $GLOBALS["locale"]["errors"]["httpError"]["404"]["description"] ?></h3>
</section>