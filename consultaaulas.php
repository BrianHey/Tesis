<?php 

require('conexion.php');


$aula = $_POST['aula'];

$horainicio = $_POST['horainicio'];
$horafinal = $_POST['horafinal'];

$fechainicio = $_POST['fechainicial'];
$fechafinal= $_POST['fechafinal'];

$busca = mysql_query(" SELECT * FROM `eventos`  ");

$piloto= "";
while( $choque = mysql_fetch_array($busca) ){

	if ($choque[6] == $aula && $choque[11] == $fechainicio && $choque[12] == $fechafinal) {
		echo "Esta aula está ocupada para este fecha";
	}else{
		$piloto= "1";
	}
 	
}

echo $piloto;




 ?>