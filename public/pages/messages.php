<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/styles.css" />
  <title>Messages</title>
</head>

<body>
  <?php
  session_start();
  include '../../layouts/header.php'; ?>
  <div class="grid-container">
    <div class="sidebar-actions">
      <a href="pruebaCalendar.php"><img src="../../src/consultar-calendario.png" /></a>
      <a href="messages.php"><img src="../../src/mensaje.png" /></a>
      <a href="upload.php"><img src="../../src/subir-archivo.png" /></a>
    </div>
    <img class="construccion" src="../../src/construction.jpg" alt="">
  </div>
  <?php
  include '../../layouts/footer.php'; ?>

</body>

</html>