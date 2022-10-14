<?php

function GetReports(): ?array
{
    global $conn;

    $sql = "SELECT * FROM `reports`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $reports;
}

function GetNameUserById($user_id): string
{
    global $conn;

    $sql = "SELECT `name` FROM `user` WHERE id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $username = $stmt->fetchColumn();
    if ($username === false) return "کاربر ناشناس";
    elseif ($username === "") return "کاربر بدون نام";
    return $username;
}

function GetNameProjectByID($project_id): string
{
    global $conn;

    $sql = "SELECT `name` FROM `projects` WHERE id = :project_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":project_id", $project_id);
    $stmt->execute();

    $projectname = $stmt->fetchColumn();
    if ($projectname === false) return " پروژه ناشناس";
    elseif (trim($projectname) === "") return "پروژه بدون نام";
    return $projectname;
}

function GetNameProductByID($product_id): string
{
    global $conn;

    $sql = "SELECT `name` FROM `products` WHERE id = :product_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":product_id", $product_id);
    $stmt->execute();

    $productname = $stmt->fetchColumn();
    if ($productname === false) return " محصول ناشناس";
    elseif (trim($productname) === "") return "محصول بدون نام";
    return $productname;
}

function GetNameActivityByID($activity_id): string
{
    global $conn;

    $sql = "SELECT `name` FROM `activites` WHERE id = :activity_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":activity_id", $activity_id);
    $stmt->execute();

    $activityname = $stmt->fetchColumn();
    if ($activityname === false) return " فعالیت ناشناس";
    elseif (trim($activityname) === "") return "فعالیت بدون نام";
    return $activityname;
}