

  <?php 

require 'conexion.php';

$array = mysql_query("SELECT * FROM eventos");



 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Reporte</title>
 <?php include 'head.php' ?>



</head>
<body>

 <div class="loader"></div>




<div id="body">
        <?php include 'menu.php'; ?>

        <div id="cuerpo"> 

               <!-- Lista de efemerides -->

                <div id="lista-efemerides">
                          
                          <h1>Reporte de clases</h1>
                          <hr>
                            <br>
                          <h3 class="text-white"> Seleccione el rango de tiempo para el reporte </h3>
                               
                               <input id="fechaini" type="date"> - <input id="fechafin" type="date"> <br> <br>
                           
                           <button onclick="filtrar()" data-toggle="modal" data-target="#Modal-efemerides" type="button" class="btn btn-primary" id="agregar-efemeride"> <span style="transform: scale(-1,1)" class="fas fa-print"></span> Generar reporte </button> 
                           <br><br>

            <!-- 

                         <table border="2px" class="table table-hover" style="border: solid black; box-shadow: 1px 1px 7px 1px;">

                          <thead class="thead" style="background: #0277BD; border-bottom: solid 0.5px black;">
                              <tr>
                                  <th width="150px" style="color: white; border-right: black solid 0.5px;">PostGrado</th>
                                  <th width="150px" style="color: white; border-right: black solid 0.5px;">Mención</th>
                                  <th width="150px" style="color: white; border-right: black solid 0.5px;">Cohorte</th>
                                  <th width="150px" style="color: white; border-right: black solid 0.5px;">Sección</th>
                                  <th width="150px" style="color: white; border-right: black solid 0.5px;">Asignatura</th>
                                  <th width="150px" style="color: white; border-right: black solid 0.5px;">Aula</th>
                                  <th width="150px" style="color: white; border-right: black solid 0.5px;">Profesor</th>
                                  <th width="150px" style="color: white; border-right: black solid 0.5px;">Hora de Inicio</th>
                                  <th width="150px" style="color: white; border-right: black solid 0.5px;">Hora final</th>
                                  <th width="150px" style="color: white; border-right: black solid 0.5px;">Equipos</th>
                                  <th width="150px" style="color: white; border-right: transparent solid 0.5px;" >Fecha</th>
                                  
                                </tr>
                          </thead>
                          </table>




                          <div class="scroll">

                         

                          <table border="2px" class="table table-hover" id="table" style="border: solid black">

                                <tr>
                                  <td width="150px" style="color: white; border-right: black solid 0.5px;">PostGrado</td>
                                  <td width="150px" style="color: white; border-right: black solid 0.5px;">Mención</td>
                                  <td width="150px" style="color: white; border-right: black solid 0.5px;">Cohorte</td>
                                  <td width="150px" style="color: white; border-right: black solid 0.5px;">Sección</td>
                                  <td width="150px" style="color: white; border-right: black solid 0.5px;">Asignatura</td>
                                  <td width="150px" style="color: white; border-right: black solid 0.5px;">Aula</td>
                                  <td width="150px" style="color: white; border-right: black solid 0.5px;">Profesor</td>
                                  <td width="150px" style="color: white; border-right: black solid 0.5px;">Hora de Inicio</td>
                                  <td width="150px" style="color: white; border-right: black solid 0.5px;">Hora final</td>
                                  <td width="150px" style="color: white; border-right: black solid 0.5px;">Equipos</td>
                                  <td width="150px" style="color: white; border-right: transparent solid 0.5px;" >Fecha</td>
                                  
                                </tr>

                              <?php 

                                
                                while ( $eventos = mysql_fetch_array($array) ) {
                                   $evento=  $eventos[0]."||".
                                          $eventos[1]."||".
                                          $eventos[2]."||".
                                          $eventos[3];
                                  ?>
                                  <tr>
                                      <td width="150px" id="fecha-efemeride">
                                          <?php echo $eventos[1]; ?>
                                      </td>

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

                                      <td>
                                          <?php echo $eventos[10]; ?>
                                      </td>
                                       <td>
                                          <?php echo $eventos[11]; ?>
                                      </td>
                                      
                                     

                                  </tr>
                                  <?php 
                                }


                               ?>
                         
                          </table> -->
                          </div>

                      </div>  
     
      
                  
                </div>

        
        </div>  

                 

  </div>



</body>
</html>









<?php 
                          
         $a = "16:00:02";
         $b = "16:00:01";
         
                          echo $a . "- " .$b;
                          if($a > $b){
                              echo " si";
                          }
  
                          
?>