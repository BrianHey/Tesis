<?php 

session_start();

$_SESSION['usuario'] = $_POST['user'];
$_SESSION['password'] = $_POST['pass'];
$_SESSION['postgrado'] = $_POST['post'];
$_SESSION['mencion'] = $_POST['menc'];

echo $_SESSION['usuario'] . $_SESSION['password']. $_SESSION['postgrado']. $_SESSION['mencion'];
?>
