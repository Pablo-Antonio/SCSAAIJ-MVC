var tableAsistencias;
$(document).ready(function () {
  limpiarFormDictamen();
  mostrarForm(false);
  listarAsistencias();

  fntCompletado();
  fntRealizarDictamen();
  ftnCancelarDictamen();
  ftnGuardarDictamen();
});

function listarAsistencias() {
  tableAsistencias = $("#asistencias").dataTable({
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
    dom: "lBfrtip",
    buttons: [
      {
        extend: "copyHtml5",
        text: "<i class='far fa-copy'></i> Copiar",
        titleAttr: "Copiar",
        className: "btn btn-secondary",
      },
      {
        extend: "excelHtml5",
        text: "<i class='fas fa-file-excel'></i> Excel",
        titleAttr: "Esportar a Excel",
        className: "btn btn-success",
      },
      {
        extend: "pdfHtml5",
        text: "<i class='fas fa-file-pdf'></i> PDF",
        titleAttr: "Esportar a PDF",
        className: "btn btn-danger",
      },
      {
        extend: "csvHtml5",
        text: "<i class='fas fa-file-csv'></i> CSV",
        titleAttr: "Esportar a CSV",
        className: "btn btn-info",
      },
    ],
    resonsieve: "true",
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "asc"]],
  });
}

function ftnViewAsistencia(idAsistencia) {
  $.ajax({
    method: "POST",
    url: "../Ajax/asistenciasAjax.php?op=asistenciaID",
    data: { idAsistencia: idAsistencia },
  })
    .done(function (data) {
      var datos = JSON.parse(data);
      //console.log(datos);

      $("#hidden").val(datos.id);
      $("#viewAsistencia").text("DETALLES ASISTENCIA: " + idAsistencia);
      $("#fechaAsistencia").text(datos.fechaAsistencia);
      $("#solicitanteAsistencia").text(datos.solicitante);
      $("#centroAsistencia").text(datos.sede);
      $("#areaAsistencia").text(datos.area);
      //var anydesk = datos.anydesk = 1 ? "SI" : "NO";
      $("#anyDesk").text(datos.anydesk);
      $("#descripcionAsistencia").text(datos.descripcion);

      $("#mdlViewAsistencia").modal("show");
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
      //alert("Algo salió mal");
    })
    .always(function () {
      //alert("Siempre se ejecuta")
    });
}

function fntCompletado() {
  $("#completar").on("click", function () {
    $("#mdlViewAsistencia").modal("hide");
    idAsistencia = $("#hidden").val();

    Swal.fire({
      title: "¿Estás seguro?",
      text: "No se realizará el dictamen de la asistencia : " + idAsistencia,
      type: "warning",
      allowOutsideClick: false, //para que no se cierra al dar clic afuera
      //allowEnterKey:true, //cuando pulse la letra enter podra quitar el mensaje
      showCancelButton: true,
      confirmButtonText: "Sí, completar",
      cancelButtonText: "No, cancelar",
    }).then((resultado) => {
      if (resultado.value) {
        // Hicieron click en "Sí"
        $.ajax({
          method: "POST",
          url: "../Ajax/asistenciasAjax.php?op=completar",
          data: { idAsistencia: idAsistencia },
        })
          .done(function (data) {
            console.log(data);
            var datos = JSON.parse(data);
            if (datos.status == true) {
              msjAlert("success", datos.msg, "Éxito");
              tableAsistencias.api().ajax.reload();
            } else {
              msjAlert("error", datos.msg, "Error");
            }
          })
          .fail(function () {
            msjAlert("error", "Error con el Servidor", "Error");
          });
      } else {
        msjAlert("error", "", "Operación Cancelada");
      }
    });
  });
}

function fntRealizarDictamen() {
  $("#dictamen").on("click", function () {
    idAsistencia = $("#hidden").val();
    $("#mdlViewAsistencia").modal("hide");
    mostrarForm(true);
    $("#tituloDictamen").text("NÚMERO ASISTENCIA: " + idAsistencia);
    $.ajax({
      method: "POST",
      url: "../Ajax/asistenciasAjax.php?op=asistenciaID",
      data: { idAsistencia: idAsistencia },
    })
      .done(function (data) {
        var datos = JSON.parse(data);
        //console.log(datos);
        $("#hiddenDictamen").val(datos.id);
        $("#DsolicitanteAsistencia").text(datos.solicitante);
        $("#DsedeAsistencia").text(datos.sede);
        $("#DdescripcionAsistencia").text(datos.descripcion);
      })
      .fail(function () {
        msjAlert("error", "Error con el Servidor", "Error");
      })
      .always(function () {
        //alert("Siempre se ejecuta")
      });
    //msjAlert("success","cuerpo de mensaje","titulo del mensaje");
  });
}

function ftnCancelarDictamen() {
  $("#cancelarDictamen").on("click", function () {
    Swal.fire({
      title: "¿Estás seguro?",
      text:
        "¿Deeas cancelar el dictamen de la asistencia : " + idAsistencia + " ?",
      type: "warning",
      allowOutsideClick: false, //para que no se cierra al dar clic afuera
      //allowEnterKey:true, //cuando pulse la letra enter podra quitar el mensaje
      showCancelButton: true,
      confirmButtonText: "Sí",
      cancelButtonText: "No",
    }).then((resultado) => {
      if (resultado.value) {
        // Hicieron click en "Sí"
        msjAlert("success", "", "Dictamen Cancelado");
        mostrarForm(false);
      }
    });
  });
}

function ftnGuardarDictamen() {
  $("#form_dictamen").submit(function (event) {
    event.preventDefault();
    var idAsistencia = $("#hiddenDictamen").val();
    var formDictamen = new FormData($("#form_dictamen")[0]);
    formDictamen.append("idAsistenciaDictamen", idAsistencia);

    $.ajax({
      method: "POST",
      url: "../Ajax/asistenciasAjax.php?op=dictamen",
      data: formDictamen,
      contentType: false,
      processData: false,
    })
      .done(function (data) {
        //console.log(data);
        var datos = JSON.parse(data);
        if (datos.status == true) {
          limpiarFormDictamen();
          mostrarForm(false);
          tableAsistencias.api().ajax.reload();
          msjAlert("success", datos.msg, "Éxito");
        } else {
          msjAlert("error", datos.msg, "Error");
        }
      })
      .fail(function () {
        msjAlert("error", "Error con el Servidor", "Error");
      })
      .always(function () {
        //alert("Siempre se ejecuta")
      });
  });
}

function limpiarFormDictamen() {
  $("#desEquipo").val("");
  $("#numSerie").val("");
  $("#marca").val("");
  $("#modelo").val("");
  $("#inventario").val("");
  $("#nombreAsistente").val("");
  $("#desDetEquipo").val("");
}

function mostrarForm(flag) {
  if (flag) {
    $("#formularioDictamen").show();
    $("#listadoAsistencias").hide();
  } else {
    $("#listadoAsistencias").show();
    $("#formularioDictamen").hide();
  }
}

/*
  console.log("Completado:" + idAsistencia);*/

/**
 * paginas para aprender jquey
 *
 * https://notasweb.me/entrada/realizar-peticiones-post-get-con-ajax-y-jquery
 * https://guias.makeitreal.camp/jquery/realizando-peticiones-con-ajax
 * https://uniwebsidad.com/libros/fundamentos-jquery/capitulo-7/metodos-ajax-de-jquery
 *
 * Iconos
 * https://fontawesome.com/v5/icons/check-circle?s=solid&f=classic
 *
 */
