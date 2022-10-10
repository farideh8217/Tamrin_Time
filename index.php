<?php
require "core.php";

$projects = getProjects();
?>

<form action="product.php" method="GET">
    <select name="project_id">
        <?php foreach ($projects as $project_item) { ?>
            <option value="<?= $project_item["id"] ?>"><?= $project_item["name"] ?></option>
        <?php } ?>
    </select>
    <input type="submit" name="submit">
</form>
