<?php


session_start();
unset($_SESSION['author_id']);
session_destroy();
header('location: ../authentication/login.php');
// session_unset();

// header('location: ../authentication/login.php');

?>
