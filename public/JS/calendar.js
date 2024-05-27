const myModal = new bootstrap.Modal(document.getElementById("myModal"));
let frm = document.getElementById("formulario");
document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    locale: "es",
    firstDay: 1,
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,listWeek",
    },

    events: clases.map(function (clase) {
      console.log(clase.id_clases);
      var fechaYHoraInicio = clase.fecha + "T" + clase.hora;
      var fechaYHoraFin = moment(fechaYHoraInicio).add(1, "hours").format(); // Añade una hora a la hora de inicio para obtener la hora de finalización
      return {
        title: clase.title,
        start: fechaYHoraInicio,
        end: fechaYHoraFin,
        color: clase.color,
        id: clase.id_clases,
        // Añade aquí cualquier otra propiedad que necesites
      };
    }),
    dateClick: function (info) {
      document.getElementById("fecha").value = info.dateStr;
      document.getElementById("title").value = "Registro de clase";
      document.getElementById("hora").value = "00:00";
      document.getElementById("color").value = "#3788d8";

      document.getElementById("title").readOnly = false;
      document.getElementById("fecha").readOnly = false;
      document.getElementById("hora").disabled = false;
      document.getElementById("color").disabled = false;

      myModal.show();
    },

    eventClick: function (info) {
      console.log(info);
      console.log(info.event.id);
      document.getElementById("title").value = info.event.title;
      document.getElementById("fecha").value = moment(info.event.start).format(
        "YYYY-MM-DD"
      );
      document.getElementById("hora").value = moment(info.event.start).format(
        "HH:mm"
      );
      document.getElementById("color").value = info.event.backgroundColor;
      //document.getElementById("id_clases").value = info.event.id_clases;

      var newInput = document.createElement("input");
      newInput.type = "hidden"; // Establecer el tipo de entrada
      newInput.value = info.event.id; // Establecer el valor
      newInput.name = "id_clases"; // Establecer el nombre
      newInput.id = "id_clases"; // Establecer el id

      // Obtener el elemento después del cual quieres insertar el nuevo elemento de entrada
      var idProfesorElement = document.getElementById("id_profesor");
      if (idProfesorElement) {
        // Insertar el nuevo elemento de entrada después de id_profesor
        idProfesorElement.parentNode.insertBefore(
          newInput,
          idProfesorElement.nextSibling
        );
      } else {
        console.error("No se encontró el elemento con id 'id_profesor'");
      }

      // Hacer los campos de entrada no editables
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

      myModal.show();
    },
  });
  calendar.render();
});
