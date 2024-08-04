<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'blog_database';

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);


function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function login($username, $password) {
    global $conn;

    $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];
        return true;
    } else {
        return false;
    }
}

function signup($username, $password) {
    global $conn;

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    return mysqli_query($conn, $sql);
}


function getPosts() {
    global $conn;

    $sql = "SELECT id, title, content, user_id FROM posts";
    $result = mysqli_query($conn, $sql);
    $posts = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }

    return $posts;
}

function getMyPosts($user_id) {
    global $conn;

    $sql = "SELECT id, title, content FROM posts WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    $posts = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }

    return $posts;
}

function addPost($title, $content, $author_id) {
    global $conn;

    $sql = "INSERT INTO posts (title, content, user_id) VALUES ('$title', '$content', $author_id)";
    return mysqli_query($conn, $sql);
}

function deletePost($post_id, $user_id) {
    global $conn;

    $sql = "DELETE FROM posts WHERE id = $post_id AND user_id = $user_id";
    return mysqli_query($conn, $sql);
}

function updatePost($post_id, $title, $content, $user_id) {
    global $conn;

    $sql = "UPDATE posts SET title = '$title', content = '$content' WHERE id = $post_id AND user_id = $user_id";
    return mysqli_query($conn, $sql);
}

function getPost($post_id) {
    global $conn;

    $sql = "SELECT title, content FROM posts WHERE id = $post_id";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}


function getUsername($user_id) {
    global $conn;

    $sql = "SELECT username FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        return $row['username'];
    } else {
        return null;
    }
}

?>