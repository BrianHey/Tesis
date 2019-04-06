$("#Modal").on('hidden.bs.modal', function() {
    $(".efemeride-descripcion").html("");
});


var id = "";
/*Agregar clases */

function guardar() {

    var fecha = $('#fecha-truco').html();
    var postgrados = $("#postgrados").val();
    var mencion = $("#mencion").val();
    var cohorte = $("#cohorte").val();
    var seccion = $("#seccion").val();
    var asignatura = $("#asignatura").val();
    var aula = $("#aula").val();
    var profesor = $("#profesor").val();
    var horainicio = $("#horainicio").val();
    var horafinal = $("#horafinal").val();
    var equipos = $("#equipos").val();

    if (horafinal < horainicio) {
        alert("Seleccione una hora final posterior a la hora inicial");
    }else{

        $.post('consultaaulas.php', {                  
                                aula: aula,
                                horainicio: horainicio,
                                horafinal: horafinal,                          
                                fechainicial: fecha,
                                fechafinal: fecha,

                            }, function(data) {

                                if(data == "1"){

                                     $.post('agregar.php', {
                                    postgrados: postgrados,
                                    mencion: mencion,
                                    cohorte: cohorte,
                                    seccion: seccion,
                                    asignatura: asignatura,
                                    aula: aula,
                                    profesor: profesor,
                                    horainicio: horainicio,
                                    horafinal: horafinal,
                                    equipos: equipos,
                                    fechainicial: fecha,
                                    fechafinal: fecha,

                                }, function(data) {

                                  

                                    $("#Modal").modal('toggle');
                                    $("#body").fadeOut(1000);
                                    $(".loader").css('display', 'block');
                                    setTimeout(function() {
                                        location.reload();
                                    }, 1000);
                                }

                        ); 

                                }else{
                                    alert(data);
                                }
                            }

                        ); 

                       
    }

    $.post('guardarultimafecha.php', { fecha: fecha }, function(data) {});


}

/* Modificar clase */

function editar() {

    var id = $('#id-truco').html();
    var postgrados = $("#postgrados").val();
    var mencion = $("#mencion").val();
    var cohorte = $("#cohorte").val();
    var seccion = $("#seccion").val();
    var asignatura = $("#asignatura").val();
    var aula = $("#aula").val();
    var profesor = $("#profesor").val();
    var horainicio = $("#horainicio").val();
    var horafinal = $("#horafinal").val();
    var equipos = $("#equipos").val();

    $.post('modificar.php', {
        id: id,
        postgrados: postgrados,
        mencion: mencion,
        cohorte: cohorte,
        seccion: seccion,
        asignatura: asignatura,
        aula: aula,
        profesor: profesor,
        horainicio: horainicio,
        horafinal: horafinal,
        equipos: equipos,


    }, function(data) {
  
        $("#Modal").modal('toggle');
        $("#body").fadeOut(1000);
        $(".loader").css('display', 'block');
        setTimeout(function() {
            location.reload();
        }, 1000);
    });

    $.post('guardarultimafecha.php', { fecha: fecha }, function(data) {});

}

/* Eliminar clase */


function eliminar() {

    var id = $('#id-truco').html();
    var fecha = $('#fecha-truco').html();

    var r = confirm("¿Está seguro que quiere eliminar esta clase?");
    if (r == true) {

        $.post('eliminar.php', {
            id: id
        }, function(data) {
            $("#Modal").modal('toggle');
            $("#body").fadeOut(1000);
            $(".loader").css('display', 'block');
            setTimeout(function() {
                location.reload();
            }, 1000);


        });
        $.post('guardarultimafecha.php', { fecha: fecha }, function(data) {});

    } else {

    }




}

/* AULAS */

function addaula() {
    $("#add-aula").css('display', 'block');
    $("#editar-aula").css('display', 'none');
    $('.modal-title').html("Agregar aula");
}

function agregaraula() {

    var nombreaula = $("#nombre-aula").val();
    var ubicacionaula = $("#ubicacion-aula").val();
    var capacidadaula = $("#capacidad-aula").val();
    var detallesaula = $("#detalles-aula").val();
    var operacion = "agregar-aula";

  

    if (nombreaula == 0 || ubicacionaula == 0 || capacidadaula == 0 || isNaN(capacidadaula)==true ) {

        alert("Debe especificar el nombre, la ubicación y una capacidad numérica");

    }else{
       $.post('operaciones.php', {
        operacion: operacion,
        nombreaula: nombreaula,
        ubicacionaula: ubicacionaula,
        capacidadaula: capacidadaula,
        detallesaula: detallesaula,
    }, function(data) {

        alert("Aula guardada con exito");
        $("#Modal").modal('toggle');
        $("#body").fadeOut(1000);
        $(".loader").css('display', 'block');
        setTimeout(function() {
            location.reload();
        }, 1000);

    });  
    }

   
}



function borraraula(aula) {


    var r = confirm("¿Está seguro que quiere eliminar esta aula?");
    if (r == true) {
        a = aula.split('||');
        var id = a[0];

        var operacion = "borrar-aula";



        $.post('operaciones.php', {
            operacion: operacion,
            id: id,
        }, function(data) {

            alert("Aula eliminada con exito");

            $("#body").fadeOut(1000);
            $(".loader").css('display', 'block');
            setTimeout(function() {
                location.reload();
            }, 1000);

        });
    }

}

function editaraula(aula) {
    $("#add-aula").css('display', 'none');
    $("#editar-aula").css('display', 'block');
    $('.modal-title').html("Editar aula");
    a = aula.split('||');

    id = a[0];

    $('#nombre-aula').val(a[1]);
    $('#ubicacion-aula').val(a[2]);
    $('#capacidad-aula').val(a[3]);
    $('#detalles-aula').val(a[4]);

}

function editaraulas() {
    var operacion = "editar-aula";
    var nombreaula = $('#nombre-aula').val();
    var ubicacionaula = $('#ubicacion-aula').val();
    var capacidad = $('#capacidad-aula').val();
    var detallesaula = $('#detalles-aula').val();

    $.post('operaciones.php', {
        operacion: operacion,
        id: id,
        capacidad: capacidad,
        nombreaula: nombreaula,
        ubicacionaula,
        detallesaula
    }, function(data) {
        $("#Modal").modal('toggle');
        alert("Aula editada con exito");
        $("#body").fadeOut(1000);
        $(".loader").css('display', 'block');
        setTimeout(function() {
            location.reload();
        }, 1000);

    });
}


/* EFEMERIDES */

function addefemerides() {
    $("#add-efemeride").css('display', 'block');
    $("#editar-efemeride").css('display', 'none');
    $('.modal-title').html("Agregar nuevo día especial");
}

function agregarefemeride() {

    var fecha = $("#fecha").val();
    var descripcion = $("#descripcion").val();
    if (descripcion == 0 || fecha == 0) {

        alert("Debe seleccionar una fecha y agregarle una descripción");

    } else {

      
        var operacion = "agregar-efemeride";

        $.post('operaciones.php', {
            operacion: operacion,
            fecha: fecha,
            descripcion: descripcion

        }, function(data) {

            if (data == 1) {
                alert("Día especial guardado con exito");
                $("#Modal").modal('toggle');
                $("#body").fadeOut(1000);
                $(".loader").css('display', 'block');
                setTimeout(function() {
                    location.reload();
                }, 1000);
            } else {

                alert("Ya existe una efeméride para esta fecha");
            }


        });

    }
}




function eliminarefemerides(efemeride) {
    e = efemeride.split('||');

    id = e[0];

    var operacion = "eliminar-efemeride";
    var decision = confirm("¿Está seguro que quiere eliminar este día especial?");
    if (decision == true) {

        $.post('operaciones.php', {

            operacion: operacion,
            id: id

        }, function(data) {

            $("#Modal").modal('toggle');
            $("#body").fadeOut(1000);
            $(".loader").css('display', 'block');
            setTimeout(function() {
                location.reload();
            }, 1000);

        });

    }

}

function editarefemerides(efemeride) {
    $("#add-efemeride").css('display', 'none');
    $("#editar-efemeride").css('display', 'block');
    $('.modal-title').html("Editar Día especial");
    e = efemeride.split('||');

    id = e[0];

    $('#fecha').val(e[1]);
    $('#descripcion').val(e[2]);
}

function editarefemeride() {

    var operacion = "editar-efemeride";
    var fecha = $('#fecha').val();
    var descripcion = $('#descripcion').val();

    $.post('operaciones.php', {
        id: id,
        operacion: operacion,
        fecha: fecha,
        descripcion: descripcion
    }, function(data) {
        $("#Modal").modal('toggle');
        alert("Día especial editado con exito");
        $("#body").fadeOut(1000);
        $(".loader").css('display', 'block');
        setTimeout(function() {
            location.reload();
        }, 1000);

    });
}

/* Menciones */

function addmencion() {

    $('#nombre-mencion').val("");
    $("#add-mencion").css('display', 'block');
    $("#editar-mencion").css('display', 'none');
    $('.modal-title').html("Agregar mención");
}

function agregarmencion() {
    var colormencion = $("#c1").val();
    var nombremencion = $("#nombre-mencion").val();

    if (nombremencion=="" || isNaN(nombremencion)==false) {

        alert("Ingrese algún nombre, no se aceptan números");

    }
    else{
    
        var operacion = "agregar-mencion";

        $.post('operaciones.php', {
            operacion: operacion,
            colormencion: colormencion,
            nombremencion: nombremencion,

        }, function(data) {

            alert("Mencion guardada con exito");
            $("#Modal").modal('toggle');
            $("#body").fadeOut(1000);
            $(".loader").css('display', 'block');
            setTimeout(function() {
                location.reload();
            }, 1000);

        });
    }


  
}

function editarmencion(mencion) {
    $("#add-mencion").css('display', 'none');
    $("#editar-mencion").css('display', 'block');
    $('.modal-title').html("Editar mencion");

    m = mencion.split('||');

    id = m[0];

    $('#nombre-mencion').val(m[1]);
    $('#c1').val(m[2]);
    $('.minicolors-swatch-color').css('background', m[2]);
}

function editarmenciones(color) {

    var operacion = "editar-mencion";
    var nombremencion = $('#nombre-mencion').val();
    var colormencion = $("#c1").val();

    $.post('operaciones.php', {
        operacion: operacion,
        id: id,
        nombremencion: nombremencion,
        colormencion: colormencion,

    }, function(data) {
        $("#Modal").modal('toggle');
        alert("Mención editada con exito");
        $("#body").fadeOut(1000);
        $(".loader").css('display', 'block');
        setTimeout(function() {
            location.reload();
        }, 1000);

    });
}

function eliminarmencion(mencion) {
    m = mencion.split('||');

    id = m[0];

    var operacion = "eliminar-mencion";
    var decision = confirm("¿Está seguro que quiere eliminar este mención?");
    if (decision == true) {

        $.post('operaciones.php', {

            operacion: operacion,
            id: id

        }, function(data) {
            $("#body").fadeOut(1000);
            $(".loader").css('display', 'block');
            setTimeout(function() {
                location.reload();
            }, 1000);

        });

    }

}

/* buscar */

function buscar(){
    var cohorte = $('#cohorte').val();
    var mencion = $('#mencion').val();


         $.post('buscar.php', {
           cohorte: cohorte, 
           mencion: mencion

        }, function(data) {

                $("#body").fadeOut(1000);
                $(".loader").css('display', 'block');
                setTimeout(function() {
                location.reload();
                }, 1000);

        });

}

/* Secciones */

function addseccion(){

    $("#add-seccion").css('display', 'block');
    $("#editar-seccion").css('display', 'none');

}

function agregarseccion(){
   
    var cohorte = $('#cohorte').val();
    var seccion = $('#seccion').val();
    var fechini = $('#fechini').val();
    var fechfin = $('#fechfin').val();
    var mencion = $('#mencion').val();
    var operacion ="agregar-seccion";

  
    if (cohorte == 0 || seccion == 0 || fechini == 0 || fechfin == 0 || mencion ==0 ) {

        alert("Llene todos los campos");

    }else{
        $.post('operaciones.php', {

            operacion: operacion,
            cohorte: cohorte,
            seccion: seccion,
            fechini: fechini,
            fechfin: fechfin,
            mencion: mencion

        }, function(data) {
            if (data != 0) {
                alert(data);
            }else{
                    $("#body").fadeOut(1000);
                    $(".loader").css('display', 'block');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
            }
           

        });
    }

}

function editarseccion(secciones) {
    $("#add-seccion").css('display', 'none');
    $("#editar-seccion").css('display', 'block');
    $('.modal-title').html("Editar seccion");
    $('#exampleModalLabel').html("Editar seccion");

     s = secciones.split('||');

    $('#seccion').val(s[2]);
    $('#fechini').val(s[3]);
    $('#fechfin').val(s[4]);

}

function editarsecciones(){
    var seccion = $('#seccion').val();
    var fechini = $('#fechini').val();
    var fechfin = $('#fechfin').val();
    var operacion = "editar-seccion";
    var id = s[0];

    if (  seccion == 0 || fechini == 0 || fechfin == 0 ) {

        alert("Llene todos los campos");

    }else{
        $.post('operaciones.php', {

            operacion: operacion,
            id: id,
            seccion: seccion,
            fechini: fechini,
            fechfin: fechfin

        }, function(data) {
            $("#body").fadeOut(1000);
            $(".loader").css('display', 'block');
            setTimeout(function() {
                location.reload();
            }, 1000);


        });
    }

}

function borrarseccion(secciones) {
     s = secciones.split('||');
     var id = s[0];
     var operacion = "borrar-seccion";

      $.post('operaciones.php', {

            id: id,
            operacion: operacion

        }, function(data) {
            alert(data);
            $("#body").fadeOut(1000);
            $(".loader").css('display', 'block');
            setTimeout(function() {
                location.reload();
            }, 1000);

        });
    $('#seccion').val(s[2]);
    $('#fechini').val(s[3]);
    $('#fechfin').val(s[4]);

}

function filtrar() {
    var fechaini = $('#fechaini').val();
    var fechafin = $('#fechafin').val();


    if ((fechaini == "") || (fechafin == "")) {
        alert("Debe seleccionar una fecha de inicio y una fecha final para el reporte");
    } else {
        $.post('filtrar.php', {

            fechaini: fechaini,
            fechafin: fechafin,


        }, function(data) {
            /* window.location.href = "html2pdf/vendor/index.php"; */
            window.open("html2pdf/vendor/index.php");

        });

    }
}