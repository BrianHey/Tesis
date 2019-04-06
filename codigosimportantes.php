  events:
		  [
		  		
		  		<?php 

		  		while ($eventos=mysql_fetch_array($array)) {
					?>
						{
							title:<?php echo "'". $eventos[1] . "'";?>,
					  		start:<?php echo "'" . $eventos[2]. "'";?>,
					  		end:<?php echo "'" . $eventos[4]. "'";?>,
					  		editable:"true",
					  		className:"Disponible"
					  	},
					  		<?php
					  	}
					  	?>

		  	],	


------------------------------------------------------------------------------------------------------------------------------------------------------



dayClick: function(date, jsEvent, view,resourceObj) 
		  	{	
		  		alert('Resource ID: ' + resourceObj.title);
		  		$("#Modal").modal("show");
		  		$("#fecha").val(events.title);

			    /* alert('Clicked on: ' + date.format());

			    alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

			    alert('Current view: ' + view.name); */

			    // change the day's background color just for fun
			    $(this).css('background-color', 'lightblue');

			 },

-------------------------------------------------------------.............
$.ajax({
		 		type: 'POST',
		 		url: 'agregar.php',
		 		data: '',
		 		succes:functon(msg){
		 			if(msg){
		 				$("#Calendario").fullCalendar('refetchEvents');
		 				$("#Modal").modal('toggle');
		 			}
		 		},
		 		error: function(){
		 			alert("Error mi pana");
		 		}
		 	});	