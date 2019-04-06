<?php 

require 'conexion.php';

$fecha = $_POST['fecha'];
$id = $_POST['id'];

mysql_query("UPDATE `eventos` SET  `fechainicio`='$fecha', `fechafinal`='$fecha' WHERE `id`='$id'") or die(mysql_error());



 ?>