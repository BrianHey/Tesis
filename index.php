<?php 

session_start();
$user = $_SESSION['usuario'];
$pass = $_SESSION['password'];
$sesionpostgrado = $_SESSION['postgrado'];
$sesionmencion = $_SESSION['mencion'];

include 'conexion.php';

$array = mysql_query("SELECT * FROM eventos");
$array1 = mysql_query("SELECT * FROM efemerides");
$array2 = mysql_query("SELECT * FROM efemerides");
$postgrados1 = mysql_query("SELECT * FROM postgrados");
$menciones1 = mysql_query("SELECT * FROM menciones");
$cohortes1 = mysql_query("SELECT * FROM cohortes");
$secciones1 = mysql_query("SELECT * FROM secciones");
$materias1 = mysql_query("SELECT * FROM materias");
$profesores1 = mysql_query("SELECT * FROM profesores");
$aulas1 = mysql_query("SELECT * FROM aulas");

?>

<!DOCTYPE html>
<html>
<head>

	<title>Calendario</title>
	 <?php include 'head.php' ?>

 <?php include 'calendario.php' ?>



</head>
<body>

<div id="fecha-truco" style="display:none"> </div> 
<div id="id-truco" style="display:none"> </div> 
<div class="loader"></div>


<div id="body">

				<?php
					
					if ($user == null || $pass == "") {
						echo '<ul id="salir" 
		style="
		position: absolute; 
		text-decoration: none;
		left: 1550px;
    text-align: left;
    font-size: 25px;
    display: block;
    width: 100%;
    padding: 20px;
		transition: all 300ms;
		list-style: none;
		
		"> <li><a href="logout.php" style="color: white; text-shadow: 1px 1px 4px black;">  <span>Salir </span> <i class="fas fa-sign-out-alt"></i> </a></li> </ul>';

					}
					else{
						include 'menu.php';
					}
					 ?>
				

				<div id="contenido">
					<h1 style="margin-top: 10px;">Planificación académica</h1>
					<center><hr width="650"></center>
					<p style="color : white">Centro de Postgrado UDO Monagas</p> 
					<div id="calendar" >	</div>
				</div>

				
</div>		

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document" id="out">
    <div class="modal-content" id="modal-content">
      <div style="<?php if ($user == "") { echo 'display: none';} ?>" class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" id="cerrar-modal" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <table>
        	<tr> 
        			<td><label>Postgrado:</label></td>
        			<td><select name="postgrados" id="postgrados" class="form-control">
							<?php
							
								while($postgrados = mysql_fetch_array($postgrados1)){
									echo "<option value='$postgrados[1]'>$postgrados[1]</option> ";
								}
							
							?>
        			
        		
        			</select></td>
        	</tr>
        		<tr> 
        			<td><label>Menciones:</label></td>
        			<td><select name="mencion" id="mencion" class="form-control">
        				
							<?php	
							
								while($menciones = mysql_fetch_array($menciones1)){
									echo "<option value='$menciones[1]'>$menciones[1]</option> ";
								}
							
							?>							
					
        			</select></td>
        	</tr>
					<tr> 
        			<td><label>Cohorte:</label></td>
        			<td><select name="cohorte" id="cohorte" class="form-control">
        					<?php
							
								while($cohortes = mysql_fetch_array($cohortes1)){
									echo "<option value='$cohortes[1]'>$cohortes[1]</option> ";
								}
							
							?>	
        			</select></td>
        	</tr>
        	<tr> 
        			<td><label>Sección:</label></td>
        			<td><select name="seccion" id="seccion" class="form-control">
        				<?php
							
								while($secciones = mysql_fetch_array($secciones1)){
									echo "<option value='$secciones[3]'>$secciones[3]</option> ";
								}
							
							?>
        			</select></td>
        	</tr>
        
        	<tr> 
        			<td><label>Asignatura:</label></td>
        			<td><select name="asignatura" id="asignatura" class="form-control">
        				<?php
							
								while($materias = mysql_fetch_array($materias1)){
									echo "<option value='$materias[1]'>$materias[1]</option> ";
								}
							
							?>
        			</select></td>
        	</tr>
					<tr> 
        			<td><label>Profesor:</label></td>
        			<td><select name="profesor" id="profesor" class="form-control">
        					<?php
							
								while($profesores = mysql_fetch_array($profesores1)){
									echo "<option value='$profesores[2] $profesores[1]'>$profesores[2] $profesores[1] </option> ";
								}
							
							?>
        			</select></td>
        	</tr>
        	<tr> 
        			<td><label>Aula:</label></td>
        			<td><select name="aula" id="aula" class="form-control">
        			<?php
							
								while($aulas = mysql_fetch_array($aulas1)){
									echo "<option value='$aulas[1]'>$aulas[1]</option> ";
								}
							
							?>
        			</select></td>
        	</tr>
        
        	<tr> 
        			<td><label>Hora de inicio:</label></td>
        			<td><input type="time" name="horainicio" id="horainicio" class="form-control"></td>
        	</tr>
        	<tr> 
        			<td><label>Hora final:</label></td>
        			<td><input type="time" name="horafinal" id="horafinal" class="form-control"></td>
        	</tr>
        	<tr> 
        			<td><label>Equipos a utilizar:</label></td>
        			<td><input required type="text" name="equipos" id="equipos" class="form-control" ></input></td>
        	</tr>
        </table>
      
      </div>
      <div style="<?php if ($user == "") { echo 'display: none';} ?>" class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cerrar" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="guardar" onclick="guardar()">Agregar</button>
        <button type="button" class="btn btn-danger" id="eliminar" onclick="eliminar()">Eliminar</button>
        <button type="button" class="btn btn-primary" id="actualizar" onclick="editar()">Actualizar</button>
      </div>
    </div>
  </div>
</div>


<!-- Buscar fecha Modal -->

<div class="modal fade" id="Modal-fechas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        		<td><label> Seleccione fecha: </label></td>
        		<td><input type="date" id="fecha-busqueda" class="form-control"></td>
        	</tr>
        </table>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cerrar" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="buscar">Ir a la fecha</button>
        
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="bootstrap.min.js"></script>
</body>
</html>








