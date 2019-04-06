<?php 

require('conexion.php');

$id = $_POST['id'];
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

echo $id;


/*$arreglo = mysql_query("SELECT * FROM `eventos` WHERE `seccion`='$seccion'  AND `cohorte`='$cohorte' AND `horainicio`='$horainicio' AND `aula`='$aula'  ");


if(mysql_result($arreglo, 0)){
                  echo "Ya existe una clase guardada en esta fecha y ese titulo";
              }else{*/
               
                mysql_query("UPDATE `eventos` SET `postgrado`='$postgrados',`mencion`='$mencion',`seccion`='$seccion',`cohorte`='$cohorte',`asignatura`='$asignatura',`aula`='$aula',`profesor`='$profesor',`horainicio`='$horainicio',`horafinal`='$horafinal',`equipos`='$equipos' WHERE `id`='$id'  ") or die(mysql_error());

                echo "listo";

             /* }

UPDATE `eventos` SET `postgrado`='$postgrados',`mencion`='$mencion',`seccion`='$seccion',`cohorte`='$cohorte',`asignatura`='$asignatura',`aula`='$aula',`profesor`='$profesor',`horainicio`='$horainicio',`horafinal`='$horafinal',`equipos`='$equipos',`fechainicio`='$fechainicio',`fechafinal`='$fechafinal' WHERE `id`='$id' 


             */






 ?>