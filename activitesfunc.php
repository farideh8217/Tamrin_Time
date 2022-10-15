<?php
function getproduct(int $product_id): ?array
{
    global $conn;

    $sql = "SELECT * FROM `products` WHERE id = :product_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":product_id", $product_id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product === false) return null;
    return $product;
}

function getActivites(): ?array
{
    global $conn;

    $sql = "SELECT * FROM activites";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $activites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $activites;
}

function savaActivityReports(int $time, int $user_id, int $project_id, int $product_id, int $activity_id, int $normal_hours, int $normal_minutes, int $extra_hours, int $extra_minutes)
{
    global $conn;

    $create_at = time();

    $sql = "INSERT INTO `reports` (`time`, `user_id`, `project_id`, `product_id`, `activity_id`,
                       `normal_hours`, `normal_minutes`, `extra_hours`, `extra_minutes`)
            VALUES (:time,:user_id, :project_id, :product_id, :activity_id, :normal_hours, :normal_minutes, :extra_hours, :extra_minutes)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":time", $time);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":project_id", $project_id);
    $stmt->bindParam(":product_id", $product_id);
    $stmt->bindParam(":activity_id", $activity_id);
    $stmt->bindParam(":normal_hours", $normal_hours);
    $stmt->bindParam(":normal_minutes", $normal_minutes);
    $stmt->bindParam(":extra_hours", $extra_hours);
    $stmt->bindParam(":extra_minutes", $extra_minutes);
    $stmt->execute();
}

function GetProjectIdByProduct(int $product_id): ?array
{
    global $conn;

    $sql = "SELECT `project_id` FROM `products` WHERE `id`= :product_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":product_id", $product_id);
    $stmt->execute();
    $r = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($r === false) return null;
    return $r;
}