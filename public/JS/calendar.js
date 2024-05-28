// Crear una nueva instancia de modal de Bootstrap
const myModal = new bootstrap.Modal(document.getElementById("myModal"));

// Obtener el formulario del DOM
let frm = document.getElementById("formulario");

// Escuchar el evento de carga del documento
document.addEventListener("DOMContentLoaded", function () {
  // Obtener el elemento del calendario del DOM
  var calendarEl = document.getElementById("calendar");

  // Crear una nueva instancia de FullCalendar
  var calendar = new FullCalendar.Calendar(calendarEl, {
    // Configurar la vista inicial del calendario
    initialView: "dayGridMonth",
    // Configurar el idioma del calendario
    locale: "es",
    // Configurar el primer día de la semana
    firstDay: 1,
    // Configurar la barra de herramientas del encabezado
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,listWeek",
    },

    // Configurar los eventos del calendario
    events: clases.map(function (clase) {
      // Imprimir el id de la clase en la consola
      console.log(clase.id_clases);

      // Crear la fecha y hora de inicio del evento
      var fechaYHoraInicio = clase.fecha + "T" + clase.hora;

      // Crear la fecha y hora de finalización del evento
      var fechaYHoraFin = moment(fechaYHoraInicio).add(1, "hours").format();

      // Devolver el objeto del evento
      return {
        title: clase.title,
        start: fechaYHoraInicio,
        end: fechaYHoraFin,
        color: clase.color,
        id: clase.id_clases,
      };
    }),

    // Configurar el comportamiento al hacer clic en una fecha
    dateClick: function (info) {
      // Configurar los valores de los campos del formulario
      document.getElementById("fecha").value = info.dateStr;
      document.getElementById("title").value = "Registro de clase";
      document.getElementById("hora").value = "00:00";
      document.getElementById("color").value = "#3788d8";

      // Hacer los campos del formulario editables
      document.getElementById("title").readOnly = false;
      document.getElementById("fecha").readOnly = false;
      document.getElementById("hora").disabled = false;
      document.getElementById("color").disabled = false;

      // Mostrar el modal
      myModal.show();
    },

    // Configurar el comportamiento al hacer clic en un evento
    eventClick: function (info) {
      // Imprimir la información del evento en la consola
      console.log(info);
      console.log(info.event.id);

      // Configurar los valores de los campos del formulario
      document.getElementById("title").value = info.event.title;
      document.getElementById("fecha").value = moment(info.event.start).format(
        "YYYY-MM-DD"
      );
      document.getElementById("hora").value = moment(info.event.start).format(
        "HH:mm"
      );
      document.getElementById("color").value = info.event.backgroundColor;

      // Crear un nuevo elemento de entrada oculto
      var newInput = document.createElement("input");
      newInput.type = "hidden";
      newInput.value = info.event.id;
      newInput.name = "id_clases";
      newInput.id = "id_clases";

      // Insertar el nuevo elemento de entrada después de id_profesor
      var idProfesorElement = document.getElementById("id_profesor");
      if (idProfesorElement) {
        idProfesorElement.parentNode.insertBefore(
          newInput,
          idProfesorElement.nextSibling
        );
      } else {
        console.error("No se encontró el elemento con id 'id_profesor'");
      }

      // Hacer los campos del formulario no editables
      document.getElementById("title").readOnly = true;
      document.getElementById("fecha").readOnly = true;
      document.getElementById("hora").disabled = true;
      document.getElementById("color").disabled = true;

      // Crear un nuevo botón para eliminar el evento
      var newButton = document.createElement("button");
      newButton.className = "btn btn-danger";
      newButton.id = "btnEliminar";
      newButton.type = "submit";
      newButton.name = "eliminarEvento";
      newButton.textContent = "Eliminar";

      // Reemplazar el botón existente con el nuevo botón
      var oldButton = document.getElementById("btnAccion");
      oldButton.parentNode.replaceChild(newButton, oldButton);

      // Mostrar el modal
      myModal.show();
    },
  });

  // Renderizar el calendario
  calendar.render();
});

// Escuchar el evento de carga del documento
$(document).ready(function () {
  // Escuchar el evento de clic en el botón de acción
  $("#btnAccion").on("click", function (e) {
    // Prevenir la acción predeterminada del evento
    e.preventDefault();

    // Recoger los datos del formulario
    var datos = {
      title: $("#title").val(),
      fecha: $("#fecha").val(),
      hora: $("#hora").val(),
      color: $("#color").val(),
      id_alumno: $("#id_alumno").val(),
      id_profesor: $("#id_profesor").val(),
    };

    // Enviar los datos al servidor
    $.post("../../controlador/funciones.php", datos, function (respuesta) {
      // Mostrar una alerta de éxito
      Swal.fire(
        "¡Well Done!",
        "Has reservado tu clase con éxito",
        "success"
      ).then((result) => {
        // Recargar la página si el usuario confirma la alerta
        if (result.isConfirmed) {
          location.reload();
        }
      });
    }).fail(function (jqXHR, textStatus, errorThrown) {
      // Imprimir el error en la consola
      console.error("Error: ", textStatus, errorThrown);
    });
  });

  // Escuchar el evento de clic en el botón de eliminar
  $(document).on("click", "#btnEliminar", function (e) {
    // Prevenir la acción predeterminada del evento
    e.preventDefault();

    // Recoger el valor de id_clases
    var id_clases = $("#id_clases").val();

    // Enviar los datos al servidor
    $.post(
      "../../controlador/funciones.php",
      {
        id_clases: id_clases,
        eliminarEvento: "true",
      },
      function (response) {
        // Mostrar una alerta de éxito
        Swal.fire(
          "¡Eliminado!",
          "Tu elemento ha sido eliminado.",
          "success"
        ).then((result) => {
          // Recargar la página si el usuario confirma la alerta
          if (result.isConfirmed) {
            location.reload();
          }
        });
      }
    ).fail(function (jqXHR, textStatus, errorThrown) {
      // Imprimir el error en la consola
      console.error("Error: ", textStatus, errorThrown);
    });
  });
});
