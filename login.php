<?php
require "core.php";

IsUser();

if (isset($_POST["username"], $_POST["password"], $_POST["submit"])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($username === "" || $password === "") {
        echo "نام کاربری یا رمز عبور نباید خالی باشد";
    }

    $user = GetUser($username, $password);

    if ($user !== null) {
        $_SESSION["user"] = $user;
        redirect("index.php");
    } else {
        echo "نام کاربری یا رمز عبور اشتباه است";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CodePen - Login Form</title>
</head>
<body>

<div class="login">
    <h1>Login</h1>
    <form action="" method="post">
        <input type="text" name="username" placeholder="username" required="required"/>
        <input type="password" name="password" placeholder="password" required="required"/>
        <button type="submit" class="btn btn-primary btn-block btn-large" name="submit">Let me in.</button>
    </form>
</div>

</body>
</html>

