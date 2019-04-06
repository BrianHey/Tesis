<?php 
require 'conexion.php';

$cohorte = $_POST['cohorte'];
$mencion = $_POST['mencion'];
$uno = "1";

  mysql_query(" UPDATE `buscar` SET `cohorte`='$cohorte',`mencion`='$mencion' ") or die (mysql_error());
  
  /*while($rev = mysql_fetch_array($revision) ){

  	$arreglo["data"][]= $rev;

  		
  		/*$data["id"]= $rev['id'];
  		$data["cohortes"]= $rev['cohortes'];
  		$data["fechainicio"]= $rev['fechainicio'];
  		$data["fechafinal"]= $rev['fechafinal'];
  		$data["mencion"]= $rev['mencion'];



}

   echo json_encode($arreglo);
*/
 ?>