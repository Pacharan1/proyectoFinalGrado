<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/styles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wdth,wght@75..100,300..800&display=swap" rel="stylesheet">
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
      });
      calendar.render();
    });
  </script>
  <title>Calendar</title>
</head>

<body>
  <?php
  session_start();
  include '../../layouts/header.php'; ?>
  <div class="grid-container">
    <div class="sidebar-actions">
      <a href="calendar.html"><img src="../../src/consultar-calendario.png" /></a>
      <a href="messages.html"><img src="../../src/mensaje.png" /></a>
      <a href="upload.html"><img src="../../src/subir-archivo.png" /></a>
    </div>
    <div class='my-calendar' id='calendar'></div>
  </div>
  <?php
  include '../../layouts/footer.php'; ?>
</body>

</html>