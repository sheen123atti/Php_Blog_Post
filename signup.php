<?php
session_start();
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (signup($username, $password)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error creating account";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog Vista-Sign Up</title>
    <link rel="stylesheet" href="fss.css">
    <link rel="stylesheet" href="scrollBar.css">
</head>
<body>
<div class="cont">
    <div class="container glass">
        <div class="credentials">
        <h2 class="function-heading" style="margin: 3rem;">Sign Up</h2>
    <form method="post" action="">
        <input class="username" style="
    width: 70%;
    padding: 0.5rem;
    margin-bottom: 3rem;
    box-sizing: border-box;" type="text" name="username" placeholder="Username" required><br>
        <input class="password" style="
    width: 70%;
    padding: 0.5rem;
    margin-bottom: 3rem;
    box-sizing: border-box;" type="password" name="password" placeholder="Password" required><br>
        <button class="btn" style="margin-bottom: 5rem" type="submit">Sign Up</button>
    </form>
    </div>
    </div>
    </div>
</body>
</html>
