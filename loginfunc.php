<?php
require "connect_db.php";

function getUser($username, $password): ?array
{
    global $conn;

    $sql = "SELECT * FROM `user` WHERE (username = :username OR email = :email) AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam("password", $password);
    $stmt->bindParam("email", $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    var_dump($user);
    if ($user === false) return null;
    return $user;
}
