$().ready(function () {
  asistenciasPendientes();
  dictamenRealizados();
  sinDictamen();
  usuariosRegistrados();
});

function asistenciasPendientes() {
  $.ajax({
    method: "POST",
    url: "../Ajax/dashboardAjax.php?op=1",
  })
    .done(function (data) {
      //console.log(data);
      $("#asistenciasPendientes").text(data);
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
      //alert("Algo salió mal");
    });
}

function dictamenRealizados() {
  $.ajax({
    method: "POST",
    url: "../Ajax/dashboardAjax.php?op=2",
  })
    .done(function (data) {
      //console.log(data);
      $("#dictamenesRealizados").text(data);
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
      //alert("Algo salió mal");
    });
}

function sinDictamen() {
  $.ajax({
    method: "POST",
    url: "../Ajax/dashboardAjax.php?op=3",
  })
    .done(function (data) {
      //console.log(data);
      $("#sinDictamen").text(data);
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
      //alert("Algo salió mal");
    });
}

function usuariosRegistrados() {
  $.ajax({
    method: "POST",
    url: "../Ajax/dashboardAjax.php?op=4",
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
