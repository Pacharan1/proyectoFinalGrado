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
    dateClick: function (info) {
      document.getElementById("start").value = info.dateStr;
      document.getElementById("titulo").textContent = "Registro de clase";
      myModal.show();
    },
  });
  calendar.render();
  frm.addEventListener("submit", function (e) {
    e.preventDefault();
    const title = document.getElementById("title").value;
    const fecha = document.getElementById("start").value;
    const color = document.getElementById("color").value;
    if (title == "" || fecha == "" || color == "") {
      alert("Todos los campos son obligatorios");
      return;
      // https://www.youtube.com/watch?v=dI8Hx6pJZW0
      // 5:30
    }
  });
});
