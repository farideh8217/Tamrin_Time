<?php
session_start();

require "loginfunc.php";
require "projectfunc.php";
require "productfunc.php";
require "activitesfunc.php";
require "reportsfunc.php";

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

function NotIsUser()
{
    global $isAuth;

    if ($isAuth !== true) {
        redirect("login.php");
    }
}