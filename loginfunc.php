<?php
require "connect_db.php";

function GetUser($username, $password): ?array
{
    global $conn;

    $sql = "SELECT * FROM `user` WHERE (username = :username OR email = :email) AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam("password", $password);
    $stmt->bindParam("email", $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user === false) return null;
    return $user;
}
