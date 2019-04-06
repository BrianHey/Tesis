<script type="text/javascript">

	/* Calendario*/
	$(document).ready(function(){


		 $('#calendar').fullCalendar({

			<?php 

				$arrayultimafecha = mysql_query("SELECT * FROM `ultimafecha` WHERE `id`='2'") or die(mysql_error());

				$ultimafecha = mysql_fetch_array($arrayultimafecha);

				if($ultimafecha[1]!="0000-00-00"){
					echo "defaultDate:".  "'". $ultimafecha[1] . "'".",";
				}
				

				 
			?>
		
		 	columnHeaderFormat: 'dddd'  ,
			contentHeight: 590,
		 	customButtons: {
			    myCustomButton:{
			      text: 'Buscar fecha',
			      click: function() {
			       ;
			      
					$("#Modal-fechas").modal();
					
				

			        $("#buscar").click(function(){
			        	var fechabusqueda = $("#fecha-busqueda").val();
			        	 $('#calendar').fullCalendar('gotoDate', fechabusqueda );
						 $("#Modal-fechas").modal('toggle');


			        });

			      }
			    }
			 },

		 	header:{
		 		left: 'prev,next today myCustomButton',
		 		center: 'title',
		 		right: 'month, listWeek,agendaDay',
		 		allDaySlot: false,
		 	},
		  		  events:
		 	 [	

		  		/* Carga de las clases programadas */

		  		
		  		<?php 

		  		while ($eventos=mysql_fetch_array($array)) {

					if( ($user != null) && ($sesionmencion == "") ){

								?>
						{
							id: <?php echo "'". $eventos[0] . "'";?>,
							postgrado: <?php echo "'". $eventos[1] . "'";?>,
					  		mencion:<?php echo "'" . $eventos[2]. "'";?>,
					  		title:<?php echo "'". $eventos[5] . " | ( ". $eventos[6].  " )'";?>,
					  		seccion:<?php echo "'". $eventos[3] . "'";?>,
					  		cohorte:<?php echo "'". $eventos[4] . "'";?>,
					  		asignatura:<?php echo "'". $eventos[5] . "'";?>,
					  		aula:<?php echo "'". $eventos[6] . "'";?>,
					  		profesor:<?php echo "'". $eventos[7] . "'";?>,
					  		horainicio:<?php echo "'". $eventos[8] . "'";?>,
					  		horafinal:<?php echo "'". $eventos[9] . "'";?>,
					  		equipos:<?php echo "'". $eventos[10] . "'";?>,
					  		start:<?php echo "'". $eventos[11]. 'T'. $eventos[8]. "'";?>,
							end:<?php echo "'". $eventos[12] . 'T'. $eventos[9]. "'";?>,
							fechadelevento:<?php echo "'". $eventos[11]."'";?>,
					  		editable:"true",
							eventDurationEditable: "true",
							

						  	<?php 

						  	if ($eventos[1]=='Especialidad 1') { echo "color: 'yellow',"; 	}
						  	if ($eventos[1]=='Especialidad 2') { echo "color: 'blue',"; 	}
						  	if ($eventos[1]=='Especialidad 3') { echo "color: 'red',"; 	}
						  	if ($eventos[1]=='Especialidad 4') { echo "color: 'green',"; 	}
							
							/*echo "color: ". "'". $eventos[13] . "'" .",";*/
							echo "color: '". $eventos[13]. "' ,"; 
						  	 ?>
						  	
					  	},
					  		<?php	




							}if( ($user == null) && ($sesionmencion == $eventos[2]) ){

								?>
						{
							id: <?php echo "'". $eventos[0] . "'";?>,
					  		mencion:<?php echo "'" . $eventos[2]. "'";?>,
					  		title:<?php echo "'". $eventos[5] . " | ( ". $eventos[6].  " )'";?>,
					  		seccion:<?php echo "'". $eventos[3] . "'";?>,
					  		cohorte:<?php echo "'". $eventos[4] . "'";?>,
					  		asgnatura:<?php echo "'". $eventos[5] . "'";?>,
					  		aula:<?php echo "'". $eventos[6] . "'";?>,
					  		profesor:<?php echo "'". $eventos[7] . "'";?>,
					  		horainicio:<?php echo "'". $eventos[8] . "'";?>,
					  		horafinal:<?php echo "'". $eventos[9] . "'";?>,
					  		equipos:<?php echo "'". $eventos[10] . "'";?>,
					  		start:<?php echo "'". $eventos[11]. 'T'. $eventos[8]. "'";?>,
							end:<?php echo "'". $eventos[12] . 'T'. $eventos[9]. "'";?>,
							fechadelevento:<?php echo "'". $eventos[11]."'";?>,
					  		editable:"true",
							  eventDurationEditable: "true",


						  	<?php 

						  /*	if ($eventos[1]=='Especialidad 1') { echo "color: 'yellow',"; 	}
						  	if ($eventos[1]=='Especialidad 2') { echo "color: 'blue',"; 	}
						  	if ($eventos[1]=='Especialidad 3') { echo "color: 'red',"; 	}
						  	if ($eventos[1]=='Especialidad 4') { echo "color: 'green',"; 	}
							*/
							echo "color: ". "'". $eventos[13] . "'" .",";

						  	 ?>
						  	
					  	},
					  		<?php	




							}
					  	}
					  	?>

				/* Carga de las efemerides  */


		  		<?php 

		  		while ($eventos=mysql_fetch_array($array2)) {
					?>
						{
							id: <?php echo "'". $eventos[0] . "'";?>,
					  		mencion:<?php echo "'" . $eventos[1]. "'";?>,
					  		title: " Efemeride " ,
					  		start:<?php echo "'". $eventos[1] . "'";?>,
						  	rendering: 'background',
						  	color: 'red',
					  	},
					  		<?php
					  	}
					  	?>

		  	],	
			


			dayClick: function(date, fecha,resourceObj) 
		  	{	
				

				var fecha = date.format();


				$.post('buscar-efemeride.php', {
					fecha : fecha
				}, function(data) {
					
				
					var descripcion = data;
					if(data ==false){
						$('.efemeride-descripcion').html("");
					}else{
						$('.efemeride-descripcion').html("");
						$(".modal-body").prepend('<p style="background: #a695af; " class="efemeride-descripcion  text-center text-white">'+descripcion+'</p>');
					}
				});


				$('#fecha-truco').html(fecha);
				
		  		$("#Modal #actualizar").css('display','none');
		  		$("#Modal #eliminar").css('display','none');
		  		$("#Modal #guardar").css('display','block');
		  		$("#exampleModalLabel").html('Agregar nueva clase');
				
				$("#Modal").modal();

			    
			 }, 

			 eventClick: function(calEvent, jsEvent, view) {
				
			
				$("#fecha-truco").html(calEvent.fechadelevento);	
				
			
			 	$("#Modal").modal('show');


				$("#id-truco").html(calEvent.id);

			 	$("#Modal #guardar").css('display','none');
			 	$("#Modal #actualizar").css('display','block');
				 $("#Modal #eliminar").css('display','block');
			 	$("#exampleModalLabel").html('Modificar clase');
			 	

				$("#postgrados option").each(function(){
					  var op= $(this).attr("value");
		 	 		if (op == calEvent.postgrado) {
						  $(this).attr("selected", '');
		 	 		}
				});
				  
		 	 	$("#mencion option").each(function(){
					  var op= $(this).attr("value");
		 	 		if (op == calEvent.mencion) {
						  $(this).attr("selected", '');
		 	 		}
		 	 	});

		 	 	$("#seccion option").each(function(){
		 	 		var op= $(this).attr("value");
		 	 		if (op == calEvent.seccion) {
						  $(this).attr("selected", '');
		 	 		}
		 	 		
		 	 	});

		 	 	$("#cohorte option").each(function(){
		 	 		var op= $(this).attr("value");
		 	 		if (op == calEvent.cohorte) {
		 	 			$(this).attr("selected", '');
		 	 		}
		 	 		
		 	 	});

		 	 	$("#asignatura option").each(function(){
					  var op= $(this).attr("value");
		 	 		if (op == calEvent.asignatura) {
		 	 			$(this).attr("selected",'');
		 	 		}
		 	 		
		 	 	});

		 	 	$("#aula option").each(function(){
		 	 		var op= $(this).attr("value");
		 	 		if (op == calEvent.aula) {
		 	 			$(this).attr("selected",'');
		 	 		}
		 	 		
		 	 	});

		 	 	$("#profesor option").each(function(){
		 	 		var op= $(this).attr("value");
		 	 		if (op == calEvent.profesor) {
		 	 			$(this).attr("selected",'');
		 	 		}	
		 	 		
				  });
				  
				  $('#horainicio').val(calEvent.horainicio);
				  $('#horafinal').val(calEvent.horafinal);
				  $('#equipos').val(calEvent.equipos);



			  },
			   eventDrop: function(calEvent){
				  var fech = calEvent.start;
				  var id = calEvent.id;
				  var fecha = fech.format("YYYY-MM-DD");			 

				$.post('eventdrop.php', {

						fecha: fecha,
						id: id

				}, function(data) {

				});
			  }, 

 })

		  
	$("#calendar").fadeOut(3);
	$("#calendar").fadeIn(1000);





	
});



</script>

