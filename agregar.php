<?php 

require('conexion.php');


$postgrados = $_POST['postgrados'];
$mencion = $_POST['mencion'];
$cohorte = $_POST['cohorte'];
$seccion = $_POST['seccion'];
$asignatura = $_POST['asignatura'];
$aula = $_POST['aula'];
$profesor = $_POST['profesor'];
$horainicio = $_POST['horainicio'];
$horafinal = $_POST['horafinal'];
$equipos = $_POST['equipos'];
$fechainicio = $_POST['fechainicial'];
$fechafinal= $_POST['fechafinal'];

$back = mysql_query("SELECT * FROM menciones") or die(mysql_error());
$background = "";
while ( $backgrounds= mysql_fetch_array($back )) {
    if ($backgrounds[1] == $mencion ) {
        $background = $backgrounds[2];
    }
}

 
 $busca = mysql_query(" SELECT * FROM `eventos`  ");


while( $choque = mysql_fetch_assoc($busca) ){

	echo $choque[0];

}

                mysql_query("INSERT INTO `eventos`(`postgrado`, `mencion`,`cohorte`, `seccion`,  `asignatura`, `aula`, `profesor`, `horainicio`, `horafinal`, `equipos`, `fechainicio`, `fechafinal`,`background`) VALUES ('$postgrados','$mencion','$cohorte', '$seccion',  '$asignatura', '$aula' ,'$profesor', '$horainicio', '$horafinal', '$equipos', '$fechainicio', '$fechafinal','$background')") or die(mysql_error());

      




/*$arreglo = mysql_query("SELECT * FROM `eventos` WHERE `seccion`='$seccion'  AND `cohorte`='$cohorte' AND `horainicio`='$horainicio' AND `aula`='$aula'  ");


if(mysql_result($arreglo, 0)){
                  echo "Ya existe una clase guardada en esta fecha y ese titulo";
              }else{*/



 ?>