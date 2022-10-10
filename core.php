<?php
require "loginfunc.php";
require "projectfunc.php";
require "productfunc.php";

function redirect($path)
{
    header("Location: " . $path);
    exit();
}

if (isset($_SESSION["user"])) {
    $isAuth = true;
} else {
    $isAuth = false;
}

function IsUser()
{
    global $isAuth;

    if ($isAuth === true) {
        redirect("index.php");
    }
}
