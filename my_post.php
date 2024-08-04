<?php
session_start();
include 'functions.php';

if (isLoggedIn()) {
    $myPosts = getMyPosts($_SESSION['user_id']);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Blog Vista</title>
    <link rel="stylesheet" href="scrollBar.css">
    <style>
        body{
            height: 100%;
            margin: 0;
        }

        .post-card{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .card{
            background-color: #F2D2BD;
            border: 2px solid grey;
            display: flex;
            width:80%;
            flex-direction:column;
            align-items:center;
            border-radius: 10px;
            filter: brightness(80%);
            background-repeat: repeat;
            margin-bottom: 2rem;
        }
        .card h2{
            margin-left: 3rem;
            margin-right: 3rem;
            margin-top: 2rem;
        }
        .card p{
            margin-left: 3rem;
            margin-right: 3rem;
            margin-bottom: 3rem;
            text-align: start;
        }
        .card-button{
            display: flex;
            margin-bottom: 3rem;
        }
        #edit:hover{
            color: green;
            border: 2px solid green;
        }
        #delete:hover{
            border: 2px solid red;
            color: red;
        }
        .card a{
            text-decoration: none;
            color: black;
            margin: 0 0.5rem 0 0.5rem;
            padding: 0.5rem 0.5rem 0.5rem 0.5rem;
            border: 2px solid transparent;
            border: 2px solid black;
            border-radius: 1rem;
        }
    </style>
</head>
<body>

<?php $posts = getPosts(); ?>

<div class="post-card">

    <?php if (isLoggedIn()): ?>
        <h1>My Posts</h1>
        <?php foreach ($myPosts as $post): ?>
        <div class="card">
            <h2><?php echo $post['title']; ?></h2>
            <p><?php echo $post['content']; ?></p>
            <div class="card-button">
            <a href="edit_post.php?id=<?php echo $post['id']; ?>" id="edit">Edit</a>
            <a href="delete_post.php?id=<?php echo $post['id']; ?>" id="delete">Delete</a>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

 
</body>
</html>