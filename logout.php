<?php
session_start();

// Unset all of the session variables
$_SESSION = [];

session_destroy();

header("Location: index.php");
exit();
?>
