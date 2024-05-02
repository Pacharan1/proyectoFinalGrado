<?php

//Acceso a la base de datos por PDO
$dsn = 'mysql:host=localhost;dbname=aceenglish';
$username = 'root';
$password = 'sF@94pkgPB';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    header("location: error.php?error=" . urlencode("Error al conectar a la base de datos: " . $e->getMessage()));
    exit;
}


//FUNCIONES
function hashContrasenia($contrasenia)
{
    return password_hash($contrasenia, PASSWORD_BCRYPT);
};


// SENTENCIAS
/* aqui voy a establecer 2 funciones que ejecuten un SELECT y un INSERT en la base de datos */

function login($conexion, $usuario, $contrasena)
{/*preparo la sentencia con un prepare y la ejecuto con un execute, cada registro se hace un fetch asociativo 
    y se almacena en una variable llamada "row". Despues se compara lo que has ingresado con el resultado 
    de la base de datos con la funcion password_verify y si es correcto te muestra el mensaje de bienvenida*/
    try {
        $stm = $conexion->prepare("SELECT * FROM alumno WHERE email = :usuario");
        $stm->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $stm->execute();
        if ($stm->rowCount() == 0) {
            header("location: login.php?errorform=false");
        } else {
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            if (password_verify($contrasena, $row['contrasena'])) {

                // Guardar cada campo en una variable
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['apellidos'] = $row['apellidos'];
                $_SESSION['dni'] = $row['dni'];
                $_SESSION['telefono'] = $row['telefono'];
                $_SESSION['email'] = $row['email'];
            } else {
                header("location: login.php?errorform=false");
            }
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
};
// aqui recibimos los datos de login y ejecutamos la funcion definida arriba
if (isset($_POST["iniciarSesion"])) {
    $usuario = $_POST["email"];
    $contrasena = $_POST["password"];
    login($pdo, $usuario, $contrasena);
};

/* la funcion registro recibe los datos y ejecuta el INSERT.
Por seguridad, utiliza la funcion password_hash para encriptar la contraseña que se almacena
despues volvemos a la pagina index con un GET para que ejecute el mensaje en verde de que esta correcto */
function registro($conexion, $nombre, $apellidos, $dni, $telefono, $email, $contrasena1, $contrasena2)
{
    try {
        if (password_verify($contrasena1, $contrasena2)) {

            $stm = $conexion->prepare("INSERT INTO alumno(nombre, apellidos, dni, telefono, email, contrasena) VALUES (:nombre, :apellidos, :dni, :telefono, :email, :contrasena)");
            $stm->bindParam(":nombre", $nombre, PDO::PARAM_STR, 255);
            $stm->bindParam(":apellidos", $apellidos, PDO::PARAM_STR, 255);
            $stm->bindParam(":dni", $dni, PDO::PARAM_STR, 255);
            $stm->bindParam(":telefono", $telefono, PDO::PARAM_INT);
            $stm->bindParam(":email", $email, PDO::PARAM_STR, 255);
            $stm->bindParam(":contrasena", hashContrasenia($contrasena1), PDO::PARAM_STR, 255);
            $stm->execute();
            header("location: login.php?errorform=true");
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}
// aqui recibimos los datos de registro y ejecutamos la funcion definida arriba
if (isset($_POST["registro"])) {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $dni = $_POST["dni"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $contrasena1 = $_POST["password"];
    $contrasena2 = $_POST["repPass"];
    registro($pdo, $nombre, $apellidos, $dni, $telefono, $email, $contrasena1, $contrasena2);
}
