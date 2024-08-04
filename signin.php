<?php
session_start();
include 'functions.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (login($username, $password)) {
        header("Location: index.php");
        exit();
    } else {
        $errors['login'] = 'Invalid name or password';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog Vista-Sign In</title>
    <link rel="stylesheet" href="scrollBar.css">
    <link rel="stylesheet" href="fss.css">
</head>
<body>
    <div class="cont">
    <div class="container glass">
        <div class="credentials">
    <h2 class="function-heading" style="margin: 3rem;">Sign In</h2>

    <?php if (!empty($errors['login'])): ?>
        <div style="color: red; font-size: 1rem; margin: 1rem;"><?= $errors['login']; ?></div>
    <?php endif; ?>

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
        <button class="btn" style="margin-bottom: 4rem" type="submit">Sign In</button>
    </form>
    </div>
    </div>
    </div>
</body>
</html>
