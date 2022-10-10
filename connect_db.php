<?php
require "_secret.php";

try {
    $conn = new PDO("mysql:host=" . SERVERNAME ."; dbname=" . DBNAME, USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "connect failed" . $e->getMessage();
}
