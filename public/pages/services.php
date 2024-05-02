<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/styles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wdth,wght@75..100,300..800&display=swap" rel="stylesheet">
  <title>Tarifas</title>
</head>

<body>
  <?php
  session_start();
  include '../../layouts/header.php'; ?>
  <h2 class="titulo">Tarifas</h2>
  <div class="tarifas">
    <div class="cardtarifa">
      <img src="../../src/ESTUDIANTE 1.jpg" alt="">
      <h3>High School</h3>
      <p class="infocard">5 clases de 1 hora cada una</p>
      <p class=descuento>Sin Descuento</p>
      <h6>75 € IVA Incl.</h6>
      <button class="btncomprar1">Comprar</button>
    </div>

    <div class="cardtarifa">
      <img src="../../src/ESTUDIANTE 2.jpg" alt="">
      <h3>College</h3>
      <p class="infocard">10 clases de 1 hora cada una</p>
      <p class=descuento>13% Dto</p>
      <h6>130 € IVA Incl.</h6>
      <button class="btncomprar2">Comprar</button>
    </div>

    <div class="cardtarifa">
      <img src="../../src/ESTUDIANTE 3.jpg" alt="">
      <h3>Master</h3>
      <p class="infocard">15 clases de 1 hora cada una</p>
      <p class=descuento>26% Dto</p>
      <h6>165 € IVA Incl.</h6>
      <button class="btncomprar3">Comprar</button>
    </div>
  </div>
  <?php include '../../layouts/footer.php'; ?>
</body>

</html>