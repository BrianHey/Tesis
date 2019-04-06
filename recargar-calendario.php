<script>
 $('#calendar').fullCalendar({

		 	columnHeaderFormat: 'dddd'  ,
			contentHeight: 590,
		 	customButtons: {
			    myCustomButton:{
			      text: 'Buscar fecha',
			      click: function() {
			       ;
			      
			        $("#Modal-fechas").modal({backdrop: "static"});

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
					?>
						{
							id: <?php echo "'". $eventos[0] . "'";?>,
					  		especialidad:<?php echo "'" . $eventos[1]. "'";?>,
					  		title:<?php echo "'". $eventos[2] . "'";?>,
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
					  		editable:"true",
					  		eventDurationEditable: "true",

						  	<?php 

						  	if ($eventos[1]=='Especialidad 1') { echo "color: 'yellow',"; 	}
						  	if ($eventos[1]=='Especialidad 2') { echo "color: 'blue',"; 	}
						  	if ($eventos[1]=='Especialidad 3') { echo "color: 'red',"; 	}
						  	if ($eventos[1]=='Especialidad 4') { echo "color: 'green',"; 	}


						  	 ?>
						  	
					  	},
					  		<?php
					  	}
					  	?>

				/* Carga de las efemerides  */


		  		<?php 

		  		while ($eventos=mysql_fetch_array($array2)) {
					?>
						{
							id: <?php echo "'". $eventos[0] . "'";?>,
					  		especialidad:<?php echo "'" . $eventos[1]. "'";?>,
					  		title: " Efemeride " ,
					  		start:<?php echo "'". $eventos[1] . "'";?>,
						  	rendering: 'background',
						  	color: 'red',
					  	},
					  		<?php
					  	}
					  	?>

		  	],	

			dayClick: function(date, fecha) 
		  	{	
		  				

		  		var fecha = date.format();
				$('#a').html(fecha);
				
		  		$("#Modal #actualizar").css('display','none');
		  		$("#Modal #eliminar").css('display','none');
		  		$("#Modal #guardar").css('display','block');
		  		$("#exampleModalLabel").html('Agregar nueva clase');
				
				$("#Modal").modal();
				
				$('#guardar').click(function(){
					guardar();
				});
				
				
	

			    
			 }, 

			 eventClick: function(calEvent, jsEvent, view) {
			 		
			
			 	$("#Modal").modal('show');

			 
			 	$("#Modal #guardar").css('display','none');
			 	$("#Modal #actualizar").css('display','block');
			 	$("#exampleModalLabel").html('Modificar clase');
			 	

			 	$("#especialidad").val(calEvent.especialidad);
		 	 	$("#titulo").val(calEvent.title);
		 	 	$("#seccion").val(calEvent.seccion);
		 	 	$("#cohorte").val(calEvent.cohorte);
		 	 	$("#asignatura").val(calEvent.asignatura);
		 	 	$("#aula").val(calEvent.aula);
		 	 	$("#profesor").val(calEvent.profesor);
		 	 	$("#horainicio").val(calEvent.horainicio);
		 	 	$("#horafinal").val(calEvent.horafinal);
		 	 	$("#equipos").val(calEvent.equipos);


		 	 	$("#especialidad option").each(function(){
		 	 		var op= $(this).attr("value");
		 	 		if (op == calEvent.especialidad) {
		 	 			$(this).attr("selected");
		 	 		}
		 	 		
		 	 	});

		 	 	$("#seccion option").each(function(){
		 	 		var op= $(this).attr("value");
		 	 		if (op == calEvent.seccion) {
		 	 			$(this).attr("selected");
		 	 		}
		 	 		
		 	 	});

		 	 	$("#cohorte option").each(function(){
		 	 		var op= $(this).attr("value");
		 	 		if (op == calEvent.cohorte) {
		 	 			$(this).attr("selected");
		 	 		}
		 	 		
		 	 	});

		 	 	$("#asignatura option").each(function(){
		 	 		var op= $(this).attr("value");
		 	 		if (op == calEvent.asignatura) {
		 	 			$(this).attr("selected");
		 	 		}
		 	 		
		 	 	});

		 	 	$("#aula option").each(function(){
		 	 		var op= $(this).attr("value");
		 	 		if (op == calEvent.aula) {
		 	 			$(this).attr("selected");
		 	 		}
		 	 		
		 	 	});

		 	 	$("#profesor option").each(function(){
		 	 		var op= $(this).attr("value");
		 	 		if (op == calEvent.profesor) {
		 	 			$(this).attr("selected");
		 	 		}	
		 	 		
		 	 	});


		 	 	
		 	 	$("#actualizar").click(function(){

		 	 	

		 	 	var id = calEvent.id;
		 	 	var especialidad = $("#especialidad").val();
		 	 	var titulo = $("#titulo").val();
		 	 	var seccion = $("#seccion").val();
		 	 	var cohorte = $("#cohorte").val();
		 	 	var asignatura = $("#asignatura").val();
		 	 	var aula = $("#aula").val();
		 	 	var profesor = $("#profesor").val();
		 	 	var horainicio= $("#horainicio").val();
		 	 	var horafinal = $("#horafinal").val();
		 	 	var equipos = $("#equipos").val();

		 	 	$.post('modificar.php',{
		 	 	id: id,
		 		especialidad: especialidad,
		 	 	titulo: titulo,
		 	 	seccion: seccion,
		 	 	cohorte: cohorte,
		 	 	asignatura: asignatura,
		 	 	aula: aula,
		 	 	profesor: profesor,
		 	 	horainicio: horainicio,
		 	 	horafinal: horafinal,
		 	 	equipos: equipos,
		 	 	
		 		},function(data){
		 			
		 			$("#Modal").modal('toggle');

		 			location.reload();
		 		});

		 	 });

		 	 	$("#Modal #eliminar").click(function(){
				var id = calEvent.id;

		 	 		$.post('eliminar.php',{
		 	 			id: id
		 	 		},function(data){
		 	 			$("#Modal").modal('toggle');
		 	 			location.reload();
		 	 		

		 	 		});

		 	 	});

			  },

		  })

	
		 });


</script>