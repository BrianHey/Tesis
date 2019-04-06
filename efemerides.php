

  <?php 

require 'conexion.php';

$array = mysql_query("SELECT * FROM eventos");
$array2 = mysql_query("SELECT * FROM efemerides");


 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Días especiales</title>
 <?php include 'head.php' ?>



</head>
<body>

 <div class="loader"></div>




<div id="body">
        <?php include 'menu.php'; ?>

        <div id="cuerpo"> 

               <!-- Lista de efemerides -->

                <div id="lista-efemerides">
                          
                          <h1>Lista de días especiales</h1>
                          <hr>

                           <button onclick="addefemerides()" data-toggle="modal" data-target="#Modal-efemerides" type="button" class="btn btn-primary" id="agregar-efemeride">Agregar día especial <span class="fas fa-plus"></span></button> 
                           <br><br>



                         <table border="2px" class="table table-hover" style="border: solid black; box-shadow: 1px 1px 7px 1px;">

                          <thead class="thead" style="background: #0277BD; border-bottom: solid 0.5px black;">
                              <tr>
                                  <th width="150px" style="color: white; border-right: black solid 0.5px;">Fecha</th>
                                  <th style="color: white; border-right: transparent solid 0.5px;" >Descripción </th>
                                  <th width="150px" style=" border-bottom: solid 0.5px black;  border-right: solid 1px black;"></th>
                                </tr>
                          </thead>
                          </table>




                          <div class="scroll">

                         

                          <table border="2px" class="table table-hover" id="table" style="border: solid black">


                              <?php 

                                
                                while ( $efemerides = mysql_fetch_array($array2) ) {
                                   $efemeride=  $efemerides[0]."||".
                                          $efemerides[1]."||".
                                          $efemerides[2]."||".
                                          $efemerides[3];
                                  ?>
                                  <tr>
                                      <td width="150px" id="fecha-efemeride">
                                          <?php echo $efemerides[1]; ?>
                                      </td>

                                      <td>
                                          <?php echo $efemerides[2]; ?>
                                      </td>
                                      
                                      <td width="150px" >
                                         <button class="btn btn-info"  onclick="editarefemerides('<?php echo $efemeride ?>')" data-toggle="modal" data-target="#Modal-efemerides">
                                         <i class="fas fa-pencil-alt"></i>
                                         </button> 
                                         <button class="btn btn-danger" onclick="eliminarefemerides('<?php echo $efemeride ?>')">
                                         <i class="fas fa-trash"></i>
                                         </button> 
                                      </td>

                                  </tr>
                                  <?php 
                                }


                               ?>
                         
                          </table>
                          </div>

                      </div>  
     
      
                  
                </div>

        
        </div>  

                 

  </div>


 
<script src="js/bootstrap.min.js"></script>




<div class="modal fade" id="Modal-efemerides" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document" id="out">
    <div class="modal-content" id="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buscar fecha</h5>
        <button type="button" id="cerrar-modal" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <table>
                                      <tr> 
                                          <td><label>Fecha: </label></td>
                                          <td><input required type="date" name="fecha"  id="fecha" class="form-control"></td>
                                          
                                      </tr>
                                      <tr>
                                          <td>Descripción: </td>
                                          <td><input type="" name="descripcion" id="descripcion" class="form-control" required></td>
                                      </tr>
                                    </table>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cerrar" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="add-efemeride" onclick="agregarefemeride()" >Agregar</button>
        <button type="button" class="btn btn-warning" id="editar-efemeride" onclick="editarefemeride()">Editar</button>
        
      </div>
    </div>
  </div>
</div>


</body>
</html>








