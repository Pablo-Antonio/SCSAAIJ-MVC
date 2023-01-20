var tableUsuarios;
$(document).ready(function () {
  mostrarForm(false);
  listarUsuarios();

  nuevoUsuario();
  btnCancelarUsr();
  actualizarUsuario();
});

function listarUsuarios() {
  tableUsuarios = $("#tableUsuarios").dataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "../Ajax/usuariosAjax.php?op=obtener",
      dataSrc: "",
    },
    columns: [
      { data: "nombre" },
      { data: "apePat" },
      { data: "apeMat" },
      { data: "telefono" },
      { data: "tipo" },
      { data: "status" },
      { data: "acciones" },
    ],
    resonsieve: "true",
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "asc"]],
  });
}

function ftnViewUsr(idUsuario) {
  $.ajax({
    method: "POST",
    url: "../Ajax/usuariosAjax.php?op=usrId",
    data: { idUsuario: idUsuario },
  })
    .done(function (data) {
      //console.log(data);
      var datos = JSON.parse(data);

      $("#mdlViewUsr").modal("show");
      $("#viewNombre").text(datos.nombre);
      $("#viewApePat").text(datos.apePat);
      $("#viewApeMat").text(datos.apeMat);
      $("#viewTelefono").text(datos.telefono);
      $("#viewNomUsr").text(datos.nomUsr);
      $("#viewTipo").text(datos.tipo);

      if (datos.status == 1) {
        $("#viewStatus").removeClass("badge-danger");
        $("#viewStatus").addClass("badge-success");
        $("#viewStatus").text("ACTIVO");
      } else {
        $("#viewStatus").removeClass("badge-success");
        $("#viewStatus").addClass("badge-danger");
        $("#viewStatus").text("INACTIVO");
      }
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
    });
}

function nuevoUsuario() {
  $("#btnNuevoUsr").on("click", function () {
    mostrarForm(true);
    $("#form_nuevoUsuario").submit(function (event) {
      event.preventDefault();

      var nombre = $("#nombre").val();
      var apePat = $("#apePat").val();
      var apeMat = $("#apeMat").val();
      var telefono = $("#telefono").val();
      var nombreUsr = $("#nombreUsr").val();
      var password = $("#password").val();
      var tipo = $("#tipo").val();

      console.log(nombre);
      console.log(apePat);
      console.log(apeMat);
      console.log(telefono);
      console.log(nombreUsr);
      console.log(password);
      console.log(tipo);

      var formNuevo = new FormData($("#form_nuevoUsuario")[0]);

      $.ajax({
        method: "POST",
        url: "../Ajax/usuariosAjax.php?op=insertarActualizar",
        data: formNuevo,
        contentType: false,
        processData: false,
      })
        .done(function (data) {
          //console.log(data);
          var datos = JSON.parse(data);
          if (datos.status == true) {
            mostrarForm(false);
            tableUsuarios.api().ajax.reload();
            msjAlert("success", datos.msg, "Éxito");
          } else {
            msjAlert("error", datos.msg, "Error");
          }
        })
        .fail(function () {
          msjAlert("error", "Error con el Servidor", "Error");
        });
    });
  });
}

function ftnAccUsr(idUsuario, opcion) {
  if (opcion == 1) {
    $.ajax({
      method: "POST",
      url: "../Ajax/usuariosAjax.php?op=acciones",
      data: { idUsuario: idUsuario, opcion: opcion },
    })
      .done(function (data) {
        //console.log(data);
        var datos = JSON.parse(data);
        if (datos.status == true) {
          tableUsuarios.api().ajax.reload();
          msjAlert("success", "", datos.msg);
        } else {
          msjAlert("error", datos.msg, "Error");
        }
      })
      .fail(function () {
        msjAlert("error", "Error con el Servidor", "Error");
      });
  } else {
    $.ajax({
      method: "POST",
      url: "../Ajax/usuariosAjax.php?op=acciones",
      data: { idUsuario: idUsuario, opcion: opcion },
    })
      .done(function (data) {
        //console.log(data);
        var datos = JSON.parse(data);
        if (datos.status == true) {
          tableUsuarios.api().ajax.reload();
          msjAlert("success", "", datos.msg);
        } else {
          msjAlert("error", datos.msg, "Error");
        }
      })
      .fail(function () {
        msjAlert("error", "Error con el Servidor", "Error");
      });
  }
}

function ftnUpdUsr(idUsuario) {
  $.ajax({
    method: "POST",
    url: "../Ajax/usuariosAjax.php?op=usrId",
    data: { idUsuario: idUsuario },
  })
    .done(function (data) {
      //console.log(data);
      var datos = JSON.parse(data);

      $("#mdlUpdateUsr").modal("show");
      $("#hiddenIdUsr").val(idUsuario);
      $("#nombre").val(datos.nombre);
      $("#apePat").val(datos.apePat);
      $("#apeMat").val(datos.apeMat);
      $("#telefono").val(datos.telefono);
      $("#nombreUsr").val(datos.nomUsr);
      $("#password").val("");
      $("#tipo").val(datos.tipo);
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
    });
}

function actualizarUsuario() {
  $("#form_actualizarUsuario").submit(function (event) {
    event.preventDefault();
    var idUsuario = $("#hiddenIdUsr").val();
    var formUpdUsr = new FormData($("#form_actualizarUsuario")[0]);
    formUpdUsr.append("idUsuario", idUsuario);

    $.ajax({
      method: "POST",
      url: "../Ajax/usuariosAjax.php?op=guardarActualizar",
      data: formUpdUsr,
      contentType: false,
      processData: false,
    })
      .done(function (data) {
        //console.log(data);
        var datos = JSON.parse(data);
        if (datos.status == true) {
          $("#mdlUpdateUsr").modal("hide");
          tableUsuarios.api().ajax.reload();
          msjAlert("success", datos.msg, "Éxito");
        } else {
          msjAlert("error", datos.msg, "Error");
        }
      })
      .fail(function () {
        msjAlert("error", "Error con el Servidor", "Error");
      });
  });
}

function btnCancelarUsr() {
  $("#btnCancelarUsr").on("click", function () {
    mostrarForm(false);
    limpiarFormulario();
  });
}

function mostrarForm(flag) {
  if (flag) {
    limpiarFormulario();
    $("#br").hide();
    $("#formularioNuevoUsuario").show();
    $("#listadoUsuarios").hide();
    $("#divBtnNuevo").hide();
  } else {
    limpiarFormulario();
    $("#br").show();
    $("#listadoUsuarios").show();
    $("#divBtnNuevo").show();
    $("#formularioNuevoUsuario").hide();
  }
}

function limpiarFormulario() {
  $("#form_nuevoUsuario")[0].reset();
}
