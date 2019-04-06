

  <?php 

require 'conexion.php';

$cohortes1 = mysql_query("SELECT * FROM cohortes");
$mencions1 = mysql_query("SELECT * FROM menciones");
$buscar1 = mysql_query("SELECT * FROM buscar");

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Cohortes y secciones</title>
 <?php include 'head.php' ?>
<script src="js/operaciones.js"> </script>
</head>
<body>

 <div class="loader"></div>

<div id="body">
        <?php include 'menu.php'; ?>

        <div id="cuerpo"> 

               <!-- Lista de efemerides -->

                <br>
                <center > <h1> Cohortes y secciones </h1> </center>
                <div id="lista-efemerides">
                     <center><table border="solid" class="text-white">
                        <tr>
                            <td>Cohorte</td>
                            <td>    
                                    <select id="cohorte"> 
                                          <option> XII </option>
                                          <option> XIII </option>
                                          <option> XIV </option>
                                          <option> XVI </option>
                                          <option> XVII </option>
                                          <option> XVIII </option>
                                          <option> XIX </option>
                                          <option> XX </option>
                                    </select>
                           </td>
                        </tr>
                        <tr>
                            <td>Menciones</td>
                            <td>    
                                    <select id="mencion">
                                        <?php
                                        
                                            while($menciones = mysql_fetch_array($mencions1)){
                                                echo "<option value='$menciones[1]'>$menciones[1]</option>";
                                            }
                                        
                                        ?>
                                    </select>
                           </td>
                        </tr>
                     </table> </center>
                     <br>    
                         
                        <button class="btn btn-warning text-white" onclick="buscar()"> Buscar</button>

                          <hr>

                           <button onclick="addseccion()" type="button"  class="btn btn-primary" id="agregar-efemeride" data-toggle="modal" data-target="#Modal">Agregar sección <span class="fas fa-plus"></span></button> 
                           <br><br>

                           

                               <div class="scroll"> 

                          <table border="2px" class="table table-hover" id="table" style="border: solid black">
                              <tr class="thead text-white" style="background: #0277BD; border-bottom: solid 0.5px black;">
                                  <td width="150px" style="color: white; border-bottom: solid 0.5px black; border-right: transparent solid 0.5px;">Sección</td>
                                  <td  style="color: white; border-bottom: solid 0.5px black; border-right: transparent solid 0.5px;" > Fecha de inicio </td>
                                  <td  style="color: white; border-bottom: solid 0.5px black; border-right: transparent solid 0.5px;" > Fecha final </td>
                                
                                  <td width="150px" style=" border-bottom: solid 0.5px black;  border-right: solid 1px black;"></td>
           
                                    
                              </tr>
                          <div id="tables">
                              <?php 

                             while ( $buscar = mysql_fetch_array($buscar1)) {

                                
                                while ( $cohortes = mysql_fetch_array($cohortes1) ) {
                                  $secciones  = $cohortes[0]."||".
                                                $cohortes[1]."||".
                                                $cohortes[2]."||".
                                                $cohortes[3]."||".
                                                $cohortes[4];


                                        if ($cohortes[1] == $buscar[1] && $cohortes[5] == $buscar[2]) {
                                                 
                                                     
                                  ?>
                                  <tr>
                                      <td >
                                          <?php echo $cohortes[2]; ?>
                                      </td>

                                      <td>
                                          <?php echo $cohortes[3]; ?>
                                      </td>
                                      <td>
                                          <?php echo $cohortes[4]; ?>
                                      </td>
                                   
                                      
                                      <td  >
                                         <button onclick="editarseccion('<?php echo $secciones ?>')" data-toggle="modal" data-target="#Modal" class="btn btn-info" >
                                         <i class="fas fa-pencil-alt"></i>
                                         </button> 
                                         <button onclick="borrarseccion('<?php echo $secciones ?>')" class="btn btn-danger">
                                         <i class="fas fa-trash"></i>
                                         </button> 
                                      </td>

                                  </tr>
                                  <?php 
                                      } 
                                   }  
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
        <h5 class="modal-title" id="exampleModalLabel">Agregar sección</h5>
        <button type="button" id="cerrar-modal" class="close"   data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <table>
                                      <tr> 
                                          <td><label>Sección: </label></td>
                                          <td><input name="nombre-aula"  id="seccion" class="form-control"></td>
                                          
                                      </tr>
                                      <tr >
                                          <td>Fecha inicio: </td>
                                          <td> <input type="date" id="fechini" name=""></td>
                                      </tr>
                                      <tr >
                                          <td>Fecha final: </td>
                                          <td> <input type="date" id="fechfin" name=""></td></td>
                                      </tr>
                                  
                                    </table>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cerrar" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="add-seccion" onclick="agregarseccion()">Agregar</button>
        <button type="button" class="btn btn-warning" id="editar-seccion" onclick="editarsecciones()">Editar</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>
