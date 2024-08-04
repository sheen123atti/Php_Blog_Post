<?php
session_start();
include 'functions.php';

if (!isLoggedIn()) {
    header("Location: signin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $post_id = $_GET['id'];

    if (deletePost($post_id, $_SESSION['user_id'])) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting post";
    }
}
?>
