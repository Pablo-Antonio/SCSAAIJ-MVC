$(document).ready(function () {
  validarLogin();
  enviarAsistencia();
  validarTelefono("telefono");
});

function validarLogin() {
  $("#login_form").submit(function (event) {
    event.preventDefault();

    if ($("#usuario").val() == "" || $("#password").val() == "") {
      msjAlert(
        "warning",
        "Todos los campos son necesarios",
        "Campos Login Vacios"
      );
      return;
    }

    var formData = new FormData($("#login_form")[0]);

    $.ajax({
      method: "POST",
      url: "Ajax/indexAjax.php?op=iniciarSesion",
      data: formData,
      contentType: false,
      processData: false,
    })
      .done(function (data) {
        //console.log(data);
        var datos = JSON.parse(data);
        if (datos.status == true) {
          msjAlert("success", datos.msg, "Éxito");
          $(location).attr("href", "Views/dashboard.php");
        } else {
          $("#login_form")[0].reset();
          msjAlert("error", datos.msg, "Error");
        }
      })
      .fail(function () {
        msjAlert("error", "Error con el Servidor", "Error");
        //alert("Algo salió mal");
      });
  });
}

function enviarAsistencia() {
  $("#form_asistencia").submit(function (event) {
    event.preventDefault();

    var formDatos = new FormData($("#form_asistencia")[0]);

    if (
      $("#solicitante").val() == "" ||
      $("#area").val() == "" ||
      $("#sede").val() == "" ||
      $("#descripcion").val() == "" ||
      $("#telefono").val() == ""
    ) {
      msjAlert(
        "warning",
        "Todos los campos son necesarios",
        "Campos Asistencia Vacios"
      );
      return;
    } else if ($("#telefono").val().length > 10) {
      msjAlert(
        "warning",
        "Error",
        "Solo 10 digitos para el telefono"
      );
      return;
    }

    $.ajax({
      method: "POST",
      url: "Ajax/indexAjax.php?op=enviarAsistencia",
      data: formDatos,
      contentType: false,
      processData: false,
    })
      .done(function (data) {
        //console.log(data); // imprimimos la respuesta
        var datos = JSON.parse(data);
        if (datos.status == true) {
          $("#form_asistencia")[0].reset();
          msjAlert("success", datos.msg, "Éxito");
        } else {
          msjAlert("error", datos.msg, "Error");
        }
      })
      .fail(function () {
        msjAlert("error", "Algo salió mal", "");
      });
  });
}
