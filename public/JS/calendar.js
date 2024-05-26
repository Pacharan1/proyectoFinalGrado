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
      var fechaYHoraInicio = clase.fecha + "T" + clase.hora;
      var fechaYHoraFin = moment(fechaYHoraInicio).add(1, "hours").format(); // Añade una hora a la hora de inicio para obtener la hora de finalización
      return {
        title: clase.title,
        start: fechaYHoraInicio,
        end: fechaYHoraFin,
        color: clase.color,
        // Añade aquí cualquier otra propiedad que necesites
      };
    }),
    dateClick: function (info) {
      document.getElementById("fecha").value = info.dateStr;
      document.getElementById("titulo").textContent = "Registro de clase";
      myModal.show();
    },
  });
  calendar.render();
});
