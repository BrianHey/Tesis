<?php

require 'conexion.php';

$array = mysql_query("SELECT * FROM efemerides");

$fecha = $_POST['fecha'];

$data= "";

while ($efe=mysql_fetch_array($array)) {

        if($efe[1] == $fecha )
        {
            $data = $efe[2];

        }
                          
      }

     echo $data;

     
?>