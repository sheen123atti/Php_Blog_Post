<?php
session_start();
include 'functions.php';

if (!isLoggedIn()) {
    header("Location: signin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {
        $post_id = $_GET['id'];
        $post = getPost($post_id);
    } else {
        header("Location: index.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    if (updatePost($post_id, $title, $content, $_SESSION['user_id'])) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating post";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog Vista-Edit Post</title>
    <link rel="stylesheet" href="scrollBar.css">
    <link rel="stylesheet" href="fss.css">
</head>
<body>
<div class="cont">
    <div class="container glass">
        <div class="credentials">
    <h2 class="function-heading">Edit Post</h2>
    <form method="post" action="">
        
        <input type="hidden" name="id" value="<?php echo $post_id; ?>">
        <input class="username"  style="
    width: 70%;
    padding: 0.5rem;
    margin-bottom: 2rem;
    box-sizing: border-box;"  type="text" name="title" placeholder="Title" value="<?php echo $post['title']; ?>" required><br>
        <textarea class="password" style="
    width: 70%;
    padding: 0.5rem;
    margin-bottom: 2rem;
    box-sizing: border-box;" rows="10" name="content" placeholder="Content" required><?php echo $post['content']; ?></textarea><br>
        <button class="btn" type="submit">Update Post</button>
    </form>
    </div>
    </div>
    </div>
</body>
</html>
