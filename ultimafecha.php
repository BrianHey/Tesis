<?php 

require('conexion.php');


$ultimafecha = mysql_query("SELECT `ultimafecha` FROM `ultimafecha` WHERE `id`='2'") or die(mysql_error());


echo $ultimafecha;

 ?>