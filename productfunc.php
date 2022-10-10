<?php

function getProducts($project_id): ?array
{
    global $conn;

    $sql = "SELECT * FROM products WHERE project_id = :project_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":project_id", $project_id);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}