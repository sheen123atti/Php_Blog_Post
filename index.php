<?php
session_start();
include 'functions.php';

if (isLoggedIn()) {
    $myPosts = getMyPosts($_SESSION['user_id']);
    $username = getUsername($_SESSION['user_id']);
}


$social_media = array(
    'Facebook' => 'https://www.facebook.com/example',
    'Twitter' => 'https://twitter.com/example',
    'Instagram' => 'https://www.instagram.com/example',
);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Blog Vista</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="scrollBar.css">
    <style>
        body {
            height: 100%;
            margin: 0;
        }

        .main-container {
            text-align: center;
            justify-content: center;
            align-items: center;
            display: block;
        }

        .image-container {
            object-fit: cover;
            height: 100vh;
            width: 100%;
            filter: brightness(60%);
            position: relative;
            text-align: center;
            justify-content: center;
            align-items: center;
        }

        .navbar {
            color: white;
            text-align: center;
            justify-content: center;
            align-items: center;
        }

        .logo {
            position: absolute;
            top: 2rem;
            left: 1rem;
            font-size: 3rem;
            font-family: "Lucida Handwriting", Cursive;
        }

        .options {
            position: absolute;
            top: 3rem;
            right: 1rem;
            color: white;
            font-size: 1.5rem;
        }

        .options a {
            text-decoration: none;
            color: white;
            margin: 0 0.5rem 0 0.5rem;
            padding: 0.5rem 0.5rem 0.5rem 0.5rem;
            border: 2px solid transparent;
        }

        .options a:hover {
            border: 2px solid white;
            border-radius: 1rem;
        }

        .welcome {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        .sc {
            position: absolute;
            color: white;
            bottom: 1rem;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .post-container {
            margin: 1rem;
            text-align: center;
            align-items: center;
            justify-content: center;
        }

        .headings {
            display: block;
        }

        .headings a {
            text-decoration: none;
            color: black;
            position: absolute;
            bottom: -1.5rem;
            right: 1rem;
        }

        .post-card {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card {
            background-color: #F2D2BD;
            border: 2px solid grey;
            display: flex;
            width: 80%;
            flex-direction: column;
            align-items: center;
            border-radius: 10px;
            filter: brightness(80%);
            background-repeat: repeat;
            margin-bottom: 2rem;
        }

        .card h2 {
            margin-left: 3rem;
            margin-right: 3rem;
            margin-top: 2rem;
        }

        .card p {
            margin-left: 3rem;
            margin-right: 3rem;
            margin-bottom: 3rem;
            text-align: start;
        }

        .card-button {
            display: flex;
        }

        #edit:hover {
            color: green;
        }

        #delete:hover {
            color: red;
        }

        .card a {
            text-decoration: none;
            color: black;
            margin: 0 0.5rem 0 0.5rem;
            padding: 0.5rem 0.5rem 0.5rem 0.5rem;
            border: 2px solid transparent;
        }

        footer {
            padding: 3rem;
            text-align: center;
            align-items: center;
            justify-content: center;
        }

        footer p {
            font-size: 2rem;
            font-weight: 600;
        }

        footer li {
            list-style: none;
        }

        footer a {
            text-decoration: none;
            color: black;
            margin: 0.5rem;
        }

        .social-container {
            display: flex;
            justify-content: center;
            text-align: center;
            align-items: center;
            padding-top: 2rem;
            width: 100%;
        }



        .join-container{
            background-image: url("https://img.freepik.com/free-vector/colored-points-connected-net_1048-12426.jpg?w=1380&t=st=1712866945~exp=1712867545~hmac=b45eefc787be2cae55328ab6fd9131ae9c4379485529e4d8be63666954c7adb9");
            object-fit: cover;
            min-height: 35rem;
            width: 100%;
            position: relative;
            text-align: center;
            justify-content: center;
            align-items: center;
        }
        .join-txt{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            color: black;
        }
        .join-txt a{
            text-decoration: none;
            color: black;
            border: 2px solid black;
            border-radius: 10px;
            padding: 0.5rem;
            font-size: 1.5rem;
        }
        .join-txt a:hover{
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <img src="https://images.pexels.com/photos/2512282/pexels-photo-2512282.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            alt="home_img" class="image-container">
        <div class="navbar">
            <div class="logo">Blog Vista</div>
            <div class="options">
                <?php if (!isLoggedIn()): ?>
                    <a href="signin.php">Sign In</a> <a href="signup.php">Sign Up</a>
                <?php else: ?>
                    <a href="add_post.php">Add Post</a> | <a href="logout.php">Logout</a>
                <?php endif; ?>
            </div>
        </div>
        <h1 class="welcome">
            <p>Share Your Story</p>
            <p>Your Words, Our Community!</p>
        </h1>

        <p class="sc">Scroll for blogs</p>
    </div>

    <div class="headings">
        <?php if (isLoggedIn()): ?>
            <p style="font-size: 1.4rem; margin-left: 0.5rem">Welcome  <?php echo $username; ?>!</p>
            <a href="my_post.php" style="font-size: 1.4rem; text-decoration: underline;">Go To My Posts</a>
        <?php endif; ?>
    </div>


    <div class="post-container">


    <?php $posts = getPosts(); ?>

        <?php if($posts == []): echo ""?>
        <?php else: ?>

                
        
        <h2 style="font-size: 2.5rem;">All Posts</h2>
        <div class="post-card">
            
            
            <?php foreach ($posts as $post): ?>
                <div class="card">
                    <h2>
                        <?php echo $post['title']; ?>
                    </h2>
                    <p>
                        <?php echo $post['content']; ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>

        <?php endif; ?>

    </div>



    <div class="join-container">
        <div class="join-txt">
            <h2 style="font-size: 3rem; margin: 0.5rem; ">Join millions of others</h2>
            <p style="font-size: 1.5rem;">Whether sharing your expertise, breaking news, or whatever’s on your mind, you’re 
            in good company on Blogger. Sign up to discover why millions of people have published their passions here.
            </p>
            <a href="index.php">Create Your Own Blog</a>
        </div>
    </div>




    <!-- Footer -->
    <footer>
        <p>Connect, Share, Inspire <br> Make your ideas come to life with Blog Vista</p>
        <div class="social-container">
            <div style="text-align: left; width: 33.33%;">Blog Vista</div>
            <div style="width: 33.33%;">© 2024 Blog Vista</div>
            <div style="text-align: right; width: 33.33%;">
                <?php foreach ($social_media as $platform => $url): ?>
                    <a href="<?php echo $url; ?>"><i class="fab fa-<?php echo strtolower($platform); ?>"></i></a>
                <?php endforeach; ?>
            </div>
        </div>
    </footer>
</body>
</html>