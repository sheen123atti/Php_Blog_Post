<?php
session_start();
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_SESSION['user_id'];

    if (addPost($title, $content, $author_id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error adding post";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog Vista-Add Post</title>
    <link rel="stylesheet" href="scrollBar.css">
    <link rel="stylesheet" href="fss.css">

</head>
<body>
<div class="cont">
    <div class="container glass">
        <div class="credentials">
            <h2 class="function-heading">New Post</h2>
    <form method="post" action="">
        <input class="username" style="
    width: 70%;
    padding: 0.5rem;
    margin-bottom: 2rem;
    box-sizing: border-box;" type="text" name="title" placeholder="Title" required><br>
        <textarea class="password" style="
    width: 70%;
    padding: 0.5rem;
    margin-bottom: 2rem;
    box-sizing: border-box;" rows="10" name="content" placeholder="Content" required></textarea><br>
        <button class="btn" type="submit">Add Post</button>
    </form>
    </div>
    </div>
    </div>
</body>
</html>
