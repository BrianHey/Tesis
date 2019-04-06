$(document).ready(function() {

    var pagina = $('title').html();
    if (pagina == 'Efemerides') {
        $("#leyenda").css('display', 'none');
    }

    $("#add-efemeide").click(function() {


        var fecha = $("#fecha").val();
        var descripcion = $("#descripcion").val();


        if (descripcion == 0 || fecha == 0) {

            alert("Debe seleccionar una fecha y agregarle una descripción");

        } else {

            var fecha = $("#fecha").val();
            var descripcion = $("#descripcion").val();

            $.post('agregar-efemerides.php', {

                fecha: fecha,
                descripcion: descripcion

            }, function(data) {


                if (data == 1) {
                    alert('Ya existe una efemeride guardada en esta fecha');
                }
                if (data != 1) {

               
                    alert('¡Efemeride guardada exitosamente!');
                    $("#Modal").modal('toggle');
                    $("#body").fadeOut(1000);
                    $(".loader").css('display', 'block');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);


                }


            });

        }


    });



    $(".btn-danyger").click(function() {

        var decision = confirm("¿Está seguro que quiere eliminar esta efemeride?");
        if (decision == true) {

            var fecha = $(this).attr('id');
            $.post('borrar-efemerides.php', {

                fecha: fecha,

            }, function(data) {

                alert(data);

                $("#Modal").modal('toggle');
                $("#body").fadeOut(1000);
                $(".loader").css('display', 'block');
                setTimeout(function() {
                    location.reload();
                }, 1000);


            });

        }


    });

    $(".btn-info").click(function() {
        var fecha = $(this).attr('id');
        var descripcion = prompt("Escriba la nueva descripción");

        if (descripcion == "") {

            alert("Debe de escribir alguna descripciín");
            var descripcion = prompt("Escriba la nueva descripción");

        } else {

            $.post('editar-efemeride.php', {

                fecha: fecha,
                descripcion: descripcion,

            }, function(data) {

                alert(data);

                $("#Modal").modal('toggle');
                $("#body").fadeOut(1000);
                $(".loader").css('display', 'block');
                setTimeout(function() {
                    location.reload();
                }, 1000);


            });
        }
    });


});