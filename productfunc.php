<?php

function GetProducts($project_id): ?array
{
    global $conn;

    $sql = "SELECT * FROM products WHERE project_id = :project_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":project_id", $project_id);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}

function GetProject(int $project_id): ?array
{
    global $conn;

    $sql = "SELECT * FROM products WHERE project_id = :project_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":project_id", $project_id);
    $stmt->execute();
    $products = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($products === false) return null;
    return $products;
}