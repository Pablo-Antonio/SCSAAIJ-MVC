//success / info / warning / error
function msjToastr(type, msj, title) {
  toastr[type](msj, title);
}

function _post(url, datos) {
  var post = $.post(url, datos);
  return post;
}

function msjAlert(tipo, msj, titulo) {
  Swal.fire({
    position: "top-end",
    type: tipo,
    title: titulo,
    text: msj,
    showConfirmButton: false,
    timer: 1550,
  });
}

function validarTelefono(input){
  $("#"+input).keyup(function (){
    this.value = (this.value + '').replace(/[^0-9]/g, '');
  });
}

function salir() {
  $.ajax({
    method: "POST",
    url: "../Ajax/indexdAjax.php?op=salir",
  })
    .done(function (data) {
      //console.log(data);
      $("#usuariosRegistrados").text(data);
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
      //alert("Algo salió mal");
    });
}

/**
 * CODIGO QUE PUEDE AYUDAR EN UN FUTURO
 */

/*function mostrarForm(flag) {
  if (flag) {
    limpiarForm();
    $("#formularioNuevoUsr").show();
    $("#listadoUsuarios").hide();
    $("#divBtnNuevo").hide();
  } else {
    limpiarForm();
    $("#listadoUsuarios").show();
    $("#divBtnNuevo").show();
    $("#formularioNuevoUsr").hide();
  }
}

function classNuevo(flag) {
  if (flag) {
    $("#headerForm").addClass("card-success");
    $("#tituloFormuUsuario").text("NUEVO USUARIO");
    $("#btnUsuario").addClass("btn-success");
    $("#btnUsuario").text("REGISTRAR");
    $("#form_usuarios").addClass("form_nuevoUsuario");
  } else {
    $("#headerForm").removeClass("card-success");
    $("#tituloFormuUsuario").text("");
    $("#btnUsuario").removeClass("btn-success");
    $("#btnUsuario").text("");
    $("#form_usuarios").removeClass("form_nuevoUsuario");
  }
}

function classUpdate(flag) {
  if (flag) {
    $("#headerForm").addClass("card-primary");
    $("#tituloFormuUsuario").text("ACTUALIZAR USUARIO");
    $("#btnUsuario").addClass("btn-primary");
    $("#btnUsuario").text("ACTUALIZAR");
  } else {
    $("#headerForm").removeClass("card-primary");
    $("#tituloFormuUsuario").text("");
    $("#btnUsuario").removeClass("btn-primary");
    $("#btnUsuario").text("");
  }
}*/

/*tableAsistencias = $("#asistencias").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "../Ajax/asistenciasAjax.php?op=obtener",
      dataSrc: "",
    },
    columns: [
      { data: "id" },
      { data: "solicitante" },
      { data: "sede" },
      { data: "area" },
      { data: "acciones" },
    ],
    resonsieve: "true",
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "asc"]],
  });

  /*$("#asistencias").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"],
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": "../Ajax/asistenciasAjax.php?op=obtener",
            "dataSrc":""
        }
      }).buttons().container().appendTo('#asistencias_wrapper .col-md-6:eq(0)');*/
/*tabla=$('#asistencias').dataTable(
        {
            "lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
            "aProcessing": true,//Activamos el procesamiento del datatables
            "aServerSide": true,//Paginación y filtrado realizados por el servidor
            dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
            buttons: [		          
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdf'
                    ],
            "ajax":
                    {
                        url: "../Ajax/asistenciasAjax.php?op=obtener",
                        type : "get",
                        dataType : "json",						
                        error: function(e){
                            console.log(e.responseText);	
                        }
                    },
                    "columns":[
                        {"data":"id"},
                        {"data":"solicitante"},
                        {"data":"centro"},
                        {"data":"Area"},
                        {"data":"Acciones"}
                    ],
            "language": {
                "lengthMenu": "Mostrar : _MENU_ registros",
                "buttons": {
                "copyTitle": "Tabla Copiada",
                "copySuccess": {
                        _: '%d líneas copiadas',
                        1: '1 línea copiada'
                    }
                }
            },
            "bDestroy": true,
            "iDisplayLength": 5,//Paginación
            "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
        }).DataTable();*/
