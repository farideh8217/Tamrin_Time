<?php
function GetProjects(): ?array
{
    global $conn;

    $sql = "SELECT * FROM `projects`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $projects;
}
