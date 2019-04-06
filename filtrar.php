<?php 

require('conexion.php');


$fechaini = $_POST['fechaini'];
$fechafin = $_POST['fechafin'];
               
                mysql_query("UPDATE `filtro` SET `fechaini`='$fechaini',`fechafin`='$fechafin' WHERE `id`='1' ") or die(mysql_error());

   
 ?>