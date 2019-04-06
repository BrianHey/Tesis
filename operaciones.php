<?php

require 'conexion.php';

$operacion = $_POST['operacion'];


/* AULAS */
if($operacion == 'agregar-aula'){
    $nombreaula= $_POST['nombreaula'];
    $ubicacionaula = $_POST['ubicacionaula'];
    $capacidad = $_POST['capacidadaula'];
    $detallesaula = $_POST['detallesaula'];

    mysql_query("INSERT INTO `aulas`( `aulas`, `ubicacion`,`capacidad`, `detalles`) VALUES ('$nombreaula', '$ubicacionaula','$capacidad','$detallesaula')") or die(mysql_error());
}

if($operacion == 'borrar-aula'){
 
    $id= $_POST['id'];
    mysql_query("DELETE FROM `aulas` WHERE `id`='$id'") or die(mysql_error());
}

if($operacion == 'editar-aula'){

    $id= $_POST['id'];
    $nombreaula = $_POST['nombreaula'];
    $ubicacionaula = $_POST['ubicacionaula'];
    $capacidad = $_POST['capacidad'];
    $detallesaula = $_POST['detallesaula'];
    mysql_query("UPDATE `aulas` SET `aulas`='$nombreaula',`ubicacion`='$ubicacionaula',`capacidad`='$capacidad',`detalles`='$detallesaula' WHERE `id`='$id'") or die(mysql_error());
}


/* EFEMERIDES */

if($operacion == 'agregar-efemeride'){
    $fecha= $_POST['fecha'];
    $descripcion = $_POST['descripcion'];

        $arreglo = mysql_query("SELECT * FROM `efemerides` WHERE `fecha`='$fecha' ");


                    if(mysql_num_rows($arreglo) != 0){
                        echo "0";
                    }else{

                        mysql_query("INSERT INTO `efemerides`( `fecha`, `descripcion`) VALUES ('$fecha', '$descripcion')");

                        echo "1";

                    }

}

if($operacion == 'eliminar-efemeride'){
    $id= $_POST['id'];
   
    mysql_query("DELETE FROM `efemerides` WHERE `id`='$id'") or die(mysql_error());
}

if($operacion == 'editar-efemeride'){
    $id = $_POST['id'];
    $fecha= $_POST['fecha'];
    $descripcion = $_POST['descripcion'];
    mysql_query("UPDATE `efemerides` SET `fecha`='$fecha',`descripcion`='$descripcion' WHERE `id`='$id'") or die(mysql_error());
}

if($operacion == 'agregar-mencion'){
    $colormencion= $_POST['colormencion'];
    $nombremencion= $_POST['nombremencion'];
    mysql_query("INSERT INTO `menciones`(`Menciones`, `color`) VALUES ('$nombremencion','$colormencion')") or die(mysql_error());
}

if($operacion == 'editar-mencion'){
    $id = $_POST['id'];
    $colormencion= $_POST['colormencion'];
    $nombremencion= $_POST['nombremencion'];
    mysql_query("UPDATE `menciones` SET `Menciones`='$nombremencion',`color`='$colormencion' WHERE `id`='$id'") or die(mysql_error());
}

if($operacion == 'eliminar-mencion'){
    $id = $_POST['id'];
    mysql_query("DELETE FROM `menciones` WHERE `id`='$id'") or die(mysql_error());
}


/* SECCIONES */
if($operacion == 'agregar-seccion'){
    $cohortes= $_POST['cohorte'];
    $seccion=  $_POST['seccion'];
    $fechini = $_POST['fechini'];
    $fechfin = $_POST['fechfin'];
    $mencion = $_POST['mencion'];

    if ($fechfin <= $fechini) {
            
            echo "La fecha final no puede ser antes de la fecha inicial";
    }else{
          mysql_query("INSERT INTO `cohortes`( `cohortes`, `seccion`, `fechainicio`, `fechafinal`, `mencion`) VALUES ('$cohortes','$seccion','$fechini','$fechfin','$mencion')") or die(mysql_error());

          echo "Sección guardada con éxito";
    }
           
        
}

if($operacion == 'editar-seccion'){
    $id = $_POST['id'];
    $seccion= $_POST['seccion'];
    $fechini= $_POST['fechini'];
    $fechfin= $_POST['fechfin'];

    mysql_query("UPDATE `cohortes` SET `seccion`='$seccion',`fechainicio`='$fechini',`fechafinal`='$fechfin' WHERE `id`='$id'") or die(mysql_error());
}

if($operacion == 'borrar-seccion'){
    $id = $_POST['id'];

    mysql_query("DELETE FROM `cohortes` WHERE `id` = '$id'") or die(mysql_error());
    echo "Sección borrada con éxito";
}


/* Aulas */

if($operacion == 'borrar-aula'){
 
    $id= $_POST['id'];
    mysql_query("DELETE FROM `aulas` WHERE `id`='$id'") or die(mysql_error());
}

if($operacion == 'editar-aula'){

    $id= $_POST['id'];
    $nombreaula = $_POST['nombreaula'];
    $ubicacionaula = $_POST['ubicacionaula'];
    $capacidad = $_POST['capacidad'];
    $detallesaula = $_POST['detallesaula'];
    mysql_query("UPDATE `aulas` SET `aulas`='$nombreaula',`ubicacion`='$ubicacionaula',`capacidad`='$capacidad',`detalles`='$detallesaula' WHERE `id`='$id'") or die(mysql_error());
}


?>

