<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/styles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wdth,wght@75..100,300..800&display=swap" rel="stylesheet">
  <script src="../JS/scriptUpload.js"></script>
  <title>Upload</title>
</head>

<body>
  <?php include '../../layouts/header.php'; ?>
  <div class="grid-container">
    <div class="sidebar-actions">
      <a href="calendar.html"><img src="../../src/consultar-calendario.png" /></a>
      <a href="messages.html"><img src="../../src/mensaje.png" /></a>
      <a href="upload.html"><img src="../../src/subir-archivo.png" /></a>
    </div>
    <div>
      <div class="drag-area">
        <h2>Drag and drop files</h2>
        <span>or</span>
        <button class="btnsubida">Browse files</button>
        <input type="file" name="" id="input-file" hidden multiple />
      </div>
      <div id="preview"></div>
    </div>
  </div>

  <?php include '../../layouts/footer.php'; ?>

  <!-- Hay que hacer el "servidor" donde se alojaran los archivos subidos y las instrucciones de nomenclatura de los archivos -->
</body>

</html>