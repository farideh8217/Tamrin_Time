<?php
require "core.php";

NotIsUser();

if (!isset($_GET["project_id"])) {
    redirect("index.php");
}

$project_id = $_GET["project_id"];

$project = GgetProject($project_id);
if ($project === null) {
    redirect("index.php");
}

$products = GetProducts($project_id);
?>

<form action="activites.php" method="POST">

    <select name="product_id">
        <?php foreach ($products as $product_item) { ?>
            <option value="<?= $product_item["id"] ?>"><?= $product_item["name"] ?></option>
        <?php } ?>
    </select>
    <input type="submit" value="submit" name="submit">
</form>
