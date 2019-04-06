<?php 

session_start();

session_destroy();

require 'conexion.php';


$menciones1 = mysql_query("SELECT * FROM menciones");
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <script src="js/fontawesome-all.min.js"></script>
    <title>Iniciar sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='js/jquery.min.js'></script>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script>

        $(document).ready(function() {
            
            $('.fa-lock').click(function() {
            
                     var user = $('#user').val();
                     var pass = $('#pass').val();
                 if((user =="") || (pass == "")){
                     alert("Ingrese un usuario y una contraseña");
                 }else{
                     $.post('validar.php', {

                            user: user,
                            pass: pass,

                        }, function(data) {
                      
                            
                            $("body").fadeOut(1000);
                            $(".loader").css('display', 'block');
                            setTimeout(function() {
                                location.href ="index.php";
                            }, 1000);
                        }


                    );
                 }
            });
           $('.fa-user').click(function() {
               
                     var post = $("#postgrado").val();
                     var menc = $("#mencion").val();
                     $.post('validar.php', {

                            post: post,
                            menc: menc,

                        }, function(data) {

                           
                            $("body").fadeOut(1000);
                            $(".loader").css('display', 'block');
                            setTimeout(function() {
                                location.href ="index.php";
                            }, 1000);
                        }


                    );
            });
        });

    </script>
   <style> 
   
   body {  
    height: 100vh;
    overflow-y: hidden;
    background: rgba(73, 155, 234, 1);
    background: -moz-radial-gradient(center, ellipse cover, rgba(73, 155, 234, 1) 0%, rgba(32, 124, 229, 0.22) 100%);
    background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(73, 155, 234, 1)), color-stop(100%, rgba(32, 124, 229, 0.22)));
    background: -webkit-radial-gradient(center, ellipse cover, rgba(73, 155, 234, 1) 0%, rgba(32, 124, 229, 0.22) 100%);
    background: -o-radial-gradient(center, ellipse cover, rgba(73, 155, 234, 1) 0%, rgba(32, 124, 229, 0.22) 100%);
    background: -ms-radial-gradient(center, ellipse cover, rgba(73, 155, 234, 1) 0%, rgba(32, 124, 229, 0.22) 100%);
    background: radial-gradient(ellipse at center, rgba(73, 155, 234, 1) 0%, rgba(32, 124, 229, 0.22) 100%);
    filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#499bea', endColorstr='#207ce5', GradientType=1);
    animation-name: body;
    animation-duration: 2s;
    text-align: center;
    }
    @keyframes body {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
    }
    .admin, .public{
        width: 400px;
        height: 400px;
        border-radius: 10px;
        box-shadow: 1px 1px 1px 5px black;
        padding: 30px;  
        background: #1E88E5;
    }
    .admin:hover, .public:hover{
        box-shadow: 1px 1px 20px 1px white;
    }
    img{
        width: 200px;
    }
    div{
        margin: auto;
    }
    #sesiones{
        display: flex;
        justify-content: space-between;
        width: 60%;
        color: white;
    }
    .fa-lock, .fa-user{
        font-size: 100px;
        color: #0D47A1;
    }
    .fa-lock:hover,  .fa-user:hover{
        font-size: 105px;
        color: white;
        cursor: pointer;
    }
    td, label{
        color:white;
        text-shadow: 1px 1px 1px black;
        font-size: 20px;
    }
   </style>
</head>
<body>
<br>
           <img src="udologo.png">  <br><br>
    <h1 style="color:white; text-shadow: 1px 1px 1px black;"> Seleccione el inicio de sesión </h1>
    <br>
    <div id="sesiones">
        <div class="admin">
                 <h3> Administrador </h3><br> <br>
                 <table>
                        <tr >
                            <td >Usuario:</td><td><input id="user" style="margin-bottom: 10px;" class="form-control"></td>
                        </tr> 
                        <tr>
                            <td>Contraseña:</td><td><input type="password" id="pass" class="form-control"></td>
                        </tr>
                      
                 </table> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">Olvidé mi contraseña</button> <br><br>
                 <i class="fas fa-lock"></i>
            
             
        </div>
        <div class="public">
                 <h3> Público </h3><br> <br>
                 <table>
                        <tr>
                            <td>Mención:</td><td>
                            <select style="margin-bottom: 10px;" class="form-control" id="mencion">
                           <?php
							
								while($menciones = mysql_fetch_array($menciones1)){
									echo "<option value='$menciones[1]'>$menciones[1]</option>";
								}
							
							?>			
                           
                            </select>
                            </td>
                        </tr>
                        <tr >
                            <td >Sección:</td><td>
                            <select style="margin-bottom: 10px;" class="form-control" id="postgrado">
                            <option value="Ciencias Administrativas"> A </option>
                            <option> B </option>
                            </select>
                            </td>
                        </tr> 
                        
                 </table> <br><br>
                 <i class="fas fa-user"></i>
             
        </div>

    </div>

<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document" id="out">
    <div class="modal-content" id="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recuperar contraseña</h5>
        
        </button>
      </div>
      <div class="modal-body">
         <table>
                                       <tr>
                                          <td><label style="color:black; text-shadow: none">Correo: </label> </td>
                                          <td><input type="email" name="nombre-mencion" id="nombre-mencion" class="form-control" required></td>
                                      </tr>
                                     
                                    </table>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cerrar" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="add-mencion" onclick="agregarmencion()">Enviar</button>
        
      </div>
    </div>
  </div>
</div>


</body>
</html>