<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wdth,wght@75..100,300..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Dashboard</title>
</head>

<body>

    <?php
    session_start();
    require_once('../../controlador/funciones.php');
    require_once '../../layouts/header.php';
    ?>

    <div class="grid-container">
        <div class="sidebar-actions">
            <?php
            $actions = ['pruebaCalendar', 'messages', 'upload'];
            $images = ['consultar-calendario', 'mensaje', 'subir-archivo'];
            foreach ($actions as $index => $action) {
                echo "<a href='{$action}.php'><img src='../../src/{$images[$index]}.png' /></a>";
            }
            ?>
        </div>
        <div class="perfil-estudiante">
            <div class="nivel-estudiante">

            </div>
            <div class="proximaclase">
                <h3>Tu proxima clase es el 11/06/2024 a las 16:00</h3>
            </div>
            <div class="bono">
                <img src="../../src/ESTUDIANTE 2.jpg" class="img-fluid" alt="">
                <h3>Bono College</h3>
                <h4>Te quedan 5 clases disponibles</h4>
            </div>
            <div class="historico">
                <h3>Historico de Clases:</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Profesor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>07/05/2024</td>
                            <td>16:00</td>
                            <td>Beatriz</td>
                        </tr>
                        <tr>
                            <td>14/05/2024</td>
                            <td>17:00</td>
                            <td>Beatriz</td>
                        </tr>
                        <tr>
                            <td>21/05/2024</td>
                            <td>16:00</td>
                            <td>Beatriz</td>
                        </tr>
                        <tr>
                            <td>28/05/2024</td>
                            <td>19:00</td>
                            <td>Beatriz</td>
                        </tr>
                        <tr>
                            <td>04/06/2024</td>
                            <td>16:00</td>
                            <td>Beatriz</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tareas-pendientes">
                <h3>To do list:</h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="" id="firstCheckbox">
                        <label class="form-check-label" for="firstCheckbox">Final test UD 1</label>
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="" id="secondCheckbox">
                        <label class="form-check-label" for="secondCheckbox">Listening UD2 page 14</label>
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox">
                        <label class="form-check-label" for="thirdCheckbox">Exercise UD 2 page 15</label>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php require_once '../../layouts/footer.php'; ?>

</body>

</html>