

  <?php 

require 'conexion.php';

$array1= mysql_query("SELECT * FROM postgrados");
$array2= mysql_query("SELECT * FROM menciones");
$array3= mysql_query("SELECT * FROM cohortes");
$array4= mysql_query("SELECT * FROM aulas");



 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Registros</title>
 <?php include 'head.php' ?>



</head>
<body>

 <div class="loader"></div>

<div id="body">
        <?php include 'menu.php'; ?>

        <div id="registros"> 
            <div><h1>Registro General</h1> <hr> </div>

         <div class="registros">
            <div>
              <table border="solid" class="table table-hover">
               
                        <th width="100">PostGrados</th>
                        <th width="100"> <button type="button" class="btn btn-primary" id="agregar-efemeride">Agregar<span class="fas fa-plus"></span></button> 
                        </th>

                   <?php 

                                
                                while ( $postgrados = mysql_fetch_array($array1) ) {
                                  ?>
                                  <tr>
                                      <td width="150px" id="fecha-efemeride">
                                          <?php echo $postgrados[1]; ?>
                                      </td>
                                      
                                      <td width="150px" >
                                         <button class="btn btn-info" id='<?php echo $efemerides[1]; ?>'>
                                         <i class="fas fa-pencil-alt"></i>
                                         </button> 
                                         <button class="btn btn-danger" id='<?php echo $efemerides[1]; ?>'>
                                         <i class="fas fa-trash"></i>
                                         </button> 
                                      </td>

                                  </tr>
                                  <?php 
                                }


                               ?>
              </table>
          </div>


              
          <div>
               <table border="solid" class="table table-hover" style="overflow-y: scroll;">
               
                        <th >Menciones</th>
                        <th > <button type="button" class="btn btn-primary" id="agregar-efemeride">Agregar<span class="fas fa-plus"></span></button> 
                        </th>

                   <?php 

                                
                                while ( $cohortes = mysql_fetch_array($array2) ) {
                                  ?>
                                  <tr>
                                      <td width="150px" id="fecha-efemeride">
                                          <?php echo $cohortes[1]; ?>
                                      </td>
                                      
                                      <td width="150px" >
                                         <button class="btn btn-info" id='<?php echo $efemerides[1]; ?>'>
                                         <i class="fas fa-pencil-alt"></i>
                                         </button> 
                                         <button class="btn btn-danger" id='<?php echo $efemerides[1]; ?>'>
                                         <i class="fas fa-trash"></i>
                                         </button> 
                                      </td>

                                  </tr>
                                  <?php 
                                }


                               ?>
              </table>
          </div> 

           <div>
               <table border="solid" class="table table-hover" style="overflow-y: scroll;">
               
                        <th >Cohortes</th>
                        <th > <button type="button" class="btn btn-primary" id="agregar-efemeride">Agregar<span class="fas fa-plus"></span></button> 
                        </th>

                   <?php 

                                
                                while ( $cohortes = mysql_fetch_array($array3) ) {
                                  ?>
                                  <tr>
                                      <td width="150px" id="fecha-efemeride">
                                          <?php echo $cohortes[1]; ?>
                                      </td>
                                      
                                      <td width="150px" >
                                         <button class="btn btn-info" id='<?php echo $efemerides[1]; ?>'>
                                         <i class="fas fa-pencil-alt"></i>
                                         </button> 
                                         <button class="btn btn-danger" id='<?php echo $efemerides[1]; ?>'>
                                         <i class="fas fa-trash"></i>
                                         </button> 
                                      </td>

                                  </tr>
                                  <?php 
                                }


                               ?>
              </table>
          </div> 


          <div>
               <table border="solid" class="table table-hover" style="overflow-y: scroll;">
               
                        <th >Aulas</th>
                        <th > <button type="button" class="btn btn-primary" id="agregar-efemeride">Agregar<span class="fas fa-plus"></span></button> 
                        </th>

                   <?php 

                                
                                while ( $aulas = mysql_fetch_array($array4) ) {
                                  ?>
                                  <tr>
                                      <td width="150px" id="fecha-efemeride">
                                          <?php echo $aulas[1]; ?>
                                      </td>
                                      
                                      <td width="150px" >
                                         <button class="btn btn-info" id='<?php echo $aulas[1]; ?>'>
                                         <i class="fas fa-pencil-alt"></i>
                                         </button> 
                                         <button class="btn btn-danger" id='<?php echo $aulas[1]; ?>'>
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
                                          <td><label>Fecha de la efemeride: </label></td>
                                          <td><input type="date" name="fecha"  id="fecha" class="form-control"></td>
                                          
                                      </tr>
                                      <tr>
                                          <td>Descripción: </td>
                                          <td><input type="" name="descripcion" id="descripcion" class="form-control" required></td>
                                      </tr>
                                    </table>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cerrar" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="add-efemeride">Agregar</button>
        
      </div>
    </div>
  </div>
</div>


</body>
</html>