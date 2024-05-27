<div>
    <table>
        <tr>
            <th><?= $GLOBALS["locale"]["userPage"]["account"]["appTable"]["id"] ?></th>
            <th><?= $GLOBALS["locale"]["userPage"]["account"]["appTable"]["manager"] ?></th>
            <th><?= $GLOBALS["locale"]["userPage"]["account"]["appTable"]["status"] ?></th>
            <th><?= $GLOBALS["locale"]["userPage"]["account"]["appTable"]["date"] ?></th>
        </tr>

        <?php foreach ($applications as $application) { ?>
        <tr>
            <th><?= $application["id"] ?></th>
            <th><?= $application[""] ?></th>
            <th><?= $application[""] ?></th>
            <th><?= $application["status"] ?></th>
        </tr>
        <?php } ?>
    </table>
</div>