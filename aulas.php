

  <?php 

require 'conexion.php';

$aulas1 = mysql_query("SELECT * FROM aulas");

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Aulas</title>
 <?php include 'head.php' ?>

</head>
<body>

 <div class="loader"></div>




<div id="body">
        <?php include 'menu.php'; ?>

        <div id="cuerpo"> 

               <!-- Lista de efemerides -->

               

                <div id="lista-efemerides">
                          
                          <h1>Lista de las aulas</h1>
                          <hr>

                           <button  type="button" onclick="addaula()" class="btn btn-primary" id="agregar-efemeride" data-toggle="modal" data-target="#Modal">Agregar aula <span class="fas fa-plus"></span></button> 
                           <br><br>




                               <div class="scroll"> 

                          <table border="2px" class="table table-hover" id="table" style="border: solid black">
                              <tr class="thead text-white" style="background: #0277BD; border-bottom: solid 0.5px black;">
                                  <td width="150px" style="color: white; border-bottom: solid 0.5px black; border-right: transparent solid 0.5px;">Aulas</td>
                                  <td  style="color: white; border-bottom: solid 0.5px black; border-right: transparent solid 0.5px;" > Ubicacion </td>
                                  <td  style="color: white; border-bottom: solid 0.5px black; border-right: transparent solid 0.5px;" > Capacidad </td>
                                  <td style="color: white; border-bottom: solid 0.5px black; border-right: transparent solid 0.5px;" > Detalles </td>
                                  <td width="150px" style=" border-bottom: solid 0.5px black;  border-right: solid 1px black;"></td>
           
                                    
                              </tr>
                          <div id="tables">
                              <?php 

                                
                                while ( $aulas = mysql_fetch_array($aulas1) ) {
                                  $aula=  $aulas[0]."||".
                                          $aulas[1]."||".
                                          $aulas[2]."||".
                                          $aulas[3]."||".
                                          $aulas[4];
                                  ?>
                                  <tr>
                                      <td >
                                          <?php echo $aulas[1]; ?>
                                      </td>

                                      <td>
                                          <?php echo $aulas[2]; ?>
                                      </td>
                                      <td>
                                          <?php echo $aulas[3]; ?>
                                      </td>
                                      <td>
                                          <?php echo $aulas[4]; ?>
                                      </td>
                                      
                                      <td  >
                                         <button onclick="editaraula('<?php echo $aula ?>')" data-toggle="modal" data-target="#Modal" class="btn btn-info" >
                                         <i class="fas fa-pencil-alt"></i>
                                         </button> 
                                         <button onclick="borraraula('<?php echo $aula ?>')" class="btn btn-danger">
                                         <i class="fas fa-trash"></i>
                                         </button> 
                                      </td>

                                  </tr>
                                  <?php 
                                }


                               ?>
                              </div>
                          </table>
                          </div>

                      </div>  
     
      
                  
                </div>

        
        </div>  

                 

  </div>


 
<script src="js/bootstrap.min.js"></script>




<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog " role="document" id="out">
    <div class="modal-content" id="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">Agregar Aula</h5>
        <button type="button" id="cerrar-modal" class="close"  onclick="addaula()" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <table>
                                      <tr> 
                                          <td><label>Nombre: </label></td>
                                          <td><input name="nombre-aula"  id="nombre-aula" class="form-control"></td>
                                          
                                      </tr>
                                      <tr >
                                          <td>Ubicación: </td>
                                          <td> <textarea style="margin-bottom: 10px;" type="" name="ubicacion-aula" id="ubicacion-aula" class="form-control" required></textarea></td>
                                      </tr>
                                      <tr >
                                          <td>capacidad: </td>
                                          <td> <input style="margin-bottom: 10px;" type="" name="capacidad-aula" id="capacidad-aula" class="form-control" required></input></td>
                                      </tr>
                                      <tr>
                                          <td>Detalles: </td>
                                          <td><textarea  name="detalles-aula" id="detalles-aula" class="form-control" required></textarea></td>
                                      </tr>
                                    </table>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cerrar" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="add-aula" onclick="agregaraula()">Agregar</button>
        <button type="button" class="btn btn-warning" id="editar-aula" onclick="editaraulas()">Editar</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>








