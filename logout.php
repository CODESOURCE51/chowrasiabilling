<?php 
session_start();
$_SESSION['user'] == "";
$_SESSION['password'] == "";
session_unset(); 
header('Location: index.php');
?>