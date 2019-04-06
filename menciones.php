

  <?php 

require 'conexion.php';


$menciones1 = mysql_query("SELECT * FROM menciones");

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Menciones</title>
 <?php include 'head.php' ?>



</head>
<body>

 <div class="loader"></div>




<div id="body">
        <?php include 'menu.php'; ?>

        <div id="cuerpo"> 

               <!-- Lista de efemerides -->

                <div id="lista-efemerides">
                          
                          <h1>Lista de Menciones</h1>
                          <hr>

                           <button type="button" onclick="addmencion()" class="btn btn-primary" id="agregar-mencion" data-toggle="modal" data-target="#Modal">Agregar Mención <span class="fas fa-plus"></span></button> 
                           <br><br>



                         <table border="2px" class="table table-hover" style="border: solid black; box-shadow: 1px 1px 7px 1px;">

                          <thead class="thead" style="background: #0277BD; border-bottom: solid 0.5px black;">
                              <tr>
                                  <th width="150px" style="color: white; border-right: black solid 0.5px;">Color</th>
                                  <th style="color: white; border-right: transparent solid 0.5px;" > Mención </th>
                                  <th width="150px" style=" border-bottom: solid 0.5px black;  border-right: solid 1px black;"></th>
                                </tr>
                          </thead>
                          </table>




                          <div class="scroll">

                         

                          <table border="2px" class="table table-hover" id="table" style="border: solid black">


                              <?php 

                                
                                while ( $menciones = mysql_fetch_array($menciones1) ) {
                                  $mencion=$menciones[0]."||".
                                           $menciones[1]."||".
                                           $menciones[2];
                                  ?>
                                  <tr>
                                      <td width="150px" id="fecha-efemeride">
                                         <i class="fas fa-square" style="color: <?php echo $menciones[2]; ?>; font-size: 40px;"></i>
                             
                                      </td>

                                      <td>
                                          <?php echo $menciones[1]; ?>
                                      </td>
                                      
                                      <td width="150px" >
                                         <button data-toggle="modal" data-target="#Modal" class="btn btn-info" onclick="editarmencion('<?php echo $mencion ?>')">
                                         <i class="fas fa-pencil-alt"></i>
                                         </button> 
                                         <button class="btn btn-danger" onclick="eliminarmencion('<?php echo $mencion ?>')">
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




<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                          <td><label>Color: </label></td>
                                          <td><input type="hidden" value="#0088cc" name="color1" id="c1"/></td>
                                        
                                      </tr>
                                      <tr>
                                          <td>Nombre: </td>
                                          <td><input required type="" name="nombre-mencion" id="nombre-mencion" class="form-control" required></td>
                                      </tr>
                                    </table>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cerrar" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="add-mencion" onclick="agregarmencion()">Agregar</button>
        <button type="button" class="btn btn-warning" id="editar-mencion" onclick="editarmenciones()" value="submit">Editar</button>
        
      </div>
    </div>
  </div>
</div>

 <script>

 $('#c1').minicolors();
 </script>

</body>
</html>








