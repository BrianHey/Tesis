
<?php 

require 'conexion.php';  

error_reporting(0);

              $fecha = $_POST['fecha'];
              $descripcion = $_POST['descripcion'];

              $arreglo = mysql_query("SELECT * FROM `efemerides` WHERE `fecha`='$fecha' ");


              if(mysql_result($arreglo, 0)){
                  echo "1";
              }else{

                mysql_query("INSERT INTO `efemerides`( `fecha`, `descripcion`) VALUES ('$fecha', '$descripcion')");

                echo "Efemeride guardada con exito";

              }

                
?>