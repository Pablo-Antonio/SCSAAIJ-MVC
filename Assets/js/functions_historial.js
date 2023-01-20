var tableHistorial;
$(document).ready(function () {
  listarHistorial();
});

function listarHistorial() {
  tableHistorial = $("#historial").dataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "../Ajax/historialAjax.php?op=obtener",
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

function ftnViewCompletado(idHistorial) {
  $.ajax({
    method: "POST",
    url: "../Ajax/historialAjax.php?op=compledatoID",
    data: { idHistorial: idHistorial },
  })
    .done(function (data) {
      //console.log(data);
      var datos = JSON.parse(data);
      //console.log(datos);
      $("#viewCompletado").text("DETALLES ASISTENCIA: " + idHistorial);
      $("#fechaAsistencia").text(datos.fechaAsistencia);
      $("#solicitanteAsistencia").text(datos.solicitante);
      $("#centroAsistencia").text(datos.sede);
      $("#areaAsistencia").text(datos.area);
      //var anydesk = datos.anydesk = 1 ? "SI" : "NO";
      $("#anyDesk").text(datos.anydesk);
      $("#descripcionAsistencia").text(datos.descripcion);

      $("#mdlViewCompletado").modal("show");
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
      //alert("Algo salió mal");
    })
    .always(function () {
      //alert("Siempre se ejecuta")
    });
}

function ftnViewDictamen(idHistorial) {
  $.ajax({
    method: "POST",
    url: "../Ajax/historialAjax.php?op=dictamenID",
    data: { idHistorial: idHistorial },
  })
    .done(function (data) {
      //console.log(data);
      var datos = JSON.parse(data);
      //console.log(datos);
      $("#viewDictamen").text("DETALLES DICTAMEN: " + idHistorial);
      $("#DsolicitanteAsistencia").text(datos.solicitante);
      $("#DsedeAsistencia").text(datos.sede);
      $("#DdescripcionAsistencia").text(datos.descripcion);
      $("#desEquipo").text(datos.descripcionEquipo);
      $("#numSerie").text(datos.numeroSerie);
      $("#marca").text(datos.marca);
      $("#modelo").text(datos.modelo);
      $("#inventario").text(datos.inventario);
      $("#nombreAsistente").text(datos.asistente);
      $("#desDetEquipo").text(datos.descripcionDictamen);

      $("#mdlViewDictamen").modal("show");
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
      //alert("Algo salió mal");
    })
    .always(function () {
      //alert("Siempre se ejecuta")
    });
}
