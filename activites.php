<?php
require "core.php";

NotIsUser();

$user = $_SESSION["user"]["id"];

if (!isset($_POST["product_id"])) redirect("product.php");

$product_id = $_POST["product_id"];

$project_id = GetProjectIdByProduct($product_id);
if ($project_id === null) redirect("index.php");

$project_id = $project_id["project_id"];

$product = getproduct($product_id);
if ($product === null) redirect("product.php");

$activities = getActivites();

if (isset($_POST["submit1"], $_POST["values"], $_POST["normal"], $_POST["extra"]) and isset($normal_values) and isset($extra_values)) {
    $values = $_POST["values"];
    foreach ($values as $activity_id => $value) {
        $normal = $value["normal"];
        $extra = $value["extra"];

        $normal_values = explode(":", $normal);
        $extra_values = explode(":", $extra);
        $time = time();

        if (count($normal_values) === 2 && count($extra_values) === 2) {
            savaActivityReports($time, $user, $project_id, $product_id, $activity_id, (int)$normal_values[0], (int)$normal_values[1], (int)$extra_values[0], (int)$extra_values[1]);
        }
    }
}
?>
<form action="reports.php" method="POST">
    <input type="hidden" name="product_id" value="<?= $product_id ?>">
    <?php foreach ($activities as $activity_item) { ?>
        <div style="width: 200px ; height: 200px; background-color: coral">
            <h3><?= $activity_item["name"] ?></h3>
            ساعت کار عادی<input type="text" name="values[<?= $activity_item["id"] ?>][normal]" required><br>
            ساعت کار اضافه<input type="text" name="values[<?= $activity_item["id"] ?>][extra]" requireda><br>
        </div>
    <?php } ?>
    <input type="submit" value="submit" name="submit1">
</form>
