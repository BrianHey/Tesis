<?php 

require 'conexion.php';

$ultimafecha = $_POST['fecha'];


mysql_query("UPDATE `ultimafecha` SET `ultimafecha`='$ultimafecha'") or die(mysql_error());


?>