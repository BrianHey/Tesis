<?php 

require 'conexion.php';

$id = $_POST['id'];

mysql_query("DELETE FROM `eventos` WHERE `id`='$id'");

echo "alert('$id');";
 ?>