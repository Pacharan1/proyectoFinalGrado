<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wdth,wght@75..100,300..800&display=swap" rel="stylesheet">

    <title>Dashboard</title>
</head>

<body>

    <?php
    session_start();
    include('../../controlador/funciones.php');
    include '../../layouts/header.php';

    ?>
    <div class="grid-container">
        <div class="sidebar-actions">
            <a href="calendar.php"><img src="../../src/consultar-calendario.png" /></a>
            <a href="messages.php"><img src="../../src/mensaje.png" /></a>
            <a href="upload.php"><img src="../../src/subir-archivo.png" /></a>
        </div>
        <div class="perfil-estudiante">
            <div class="nivel-estudiante">
                <h2>LEVEL 3!!</h2>
            </div>
            <div class="proximaclase">
                <h3>Tu proxima clase es el 01/10/2025 a las 16:00</h3>
            </div>
            <div class="bono">
                <h3>Bono College, te quedan 6 clases disponibles</h3>
            </div>
            <div class="historico">
                <h3>Historico de Clases:</h3>
                <ul>
                    <li>Fecha 1: 01/01/2022</li>
                    <li>Fecha 2: 02/02/2022</li>
                    <li>Fecha 3: 03/03/2022</li>
                </ul>
            </div>
            <div class="tareas-pendientes">
                <h3>Tareas Pendientes:</h3>
                <ul>
                    <li>Tarea 1</li>
                    <li>Tarea 2</li>
                    <li>Tarea 3</li>
                </ul>
            </div>
        </div>


    </div>
    <?php include '../../layouts/footer.php'; ?>

</body>

</html>