<?php 

require 'conexion.php';

$array = mysql_query("SELECT * FROM eventos");
$array2 = mysql_query("SELECT * FROM filtro");
$filtros = mysql_fetch_array($array2);
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte</title>
     <style>
         #tabla{
             display: flex;
         }
         table{
            width: 100%;
            display: flex;
         }
         td{
             font-size: 15.5px;
             text-align: center;
             padding-top: 10px;
             padding-bottom: 6px;
             border-bottom: 1px solid;
         }
          #encabezado td{
             background: #0277BD; 
             border-bottom: solid 0.5px black; 
             color white;
             margin: 1px;
             padding: 10px;
         }

         h1{
             text-align:center;
             margin-top: -42px;
             margin-bottom: 30px;
         }
         div{
             display: block;
             margin: auto;
         }
     </style>
   
</head>
<body>
    <img width="60" src="../../udologo.png"> <h1>Listado de clases del <?php echo $filtros[1] ?> al <?php echo $filtros[2] ?></h1> 
    <div id="tabla">
     <table   style="border: solid black; box-shadow: 1px 1px 7px 1px;">

                           <tr id="encabezado">
                                 
                                  <td style="color: white; font-weight: bold; font-size: 13px;">Mención</td>
                                  <td style="color: white; font-weight: bold; font-size: 13px;">Cohorte</td>
                                  <td style="color: white; font-weight: bold; font-size: 13px;">Sección</td>
                                  <td style="color: white; font-weight: bold; font-size: 13px;">Asignatura</td>
                                  <td style="color: white; font-weight: bold; font-size: 13px;">Aula</td>
                                  <td style="color: white; font-weight: bold; font-size: 13px;">Profesor</td>
                                  <td style="color: white; font-weight: bold; font-size: 13px;">Hora de Inicio</td>
                                  <td style="color: white; font-weight: bold; font-size: 13px;">Hora final</td>
                                  <td style="color: white; font-weight: bold; font-size: 13px;">Fecha</td>
                                  
                                </tr>
                   <?php 

                                
                                while ( $eventos = mysql_fetch_array($array) ) {
                                        if( ( $eventos[11] >= $filtros[1]) && ( $eventos[11] <= $filtros[2])){
                                  ?>
                                  <tr>
                                    
                                      <td>
                                          <?php echo $eventos[2]; ?>
                                      </td>
                                       <td width="150px" id="fecha-efemeride">
                                          <?php echo $eventos[4]; ?>
                                      </td>

                                      <td>
                                          <?php echo $eventos[3]; ?>
                                      </td>
                                       <td width="150px" id="fecha-efemeride">
                                          <?php echo $eventos[5]; ?>
                                      </td>

                                      <td>
                                          <?php echo $eventos[6]; ?>
                                      </td>
                                       <td width="150px" id="fecha-efemeride">
                                          <?php echo $eventos[7]; ?>
                                      </td>

                                      <td>
                                          <?php echo $eventos[8]; ?>
                                      </td>
                                       <td width="150px" id="fecha-efemeride">
                                          <?php echo $eventos[9]; ?>
                                      </td>

                                      
                                       <td width="150px">
                                          <?php echo $eventos[11]; ?>
                                      </td>
                                      
                                     

                                  </tr>
                                  <?php
                                        } 
                                }


                               ?>
                          </table>
        </div>


</body>
</html>