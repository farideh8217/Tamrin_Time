<?php
require "core.php";

if (!isset($_GET["project_id"])) {
    redirect("index.php");
}

$project_id = $_GET["project_id"];
$products = getProducts($project_id);
?>

<form action="" method="post">
    <select name="product">
        <?php foreach ($products as $product_item) { ?>
            <option><?= $product_item["name"] ?></option>
        <?php } ?>
    </select>
    <input type="submit" value="submit">
</form>
