<?php

//Acceso a la base de datos por PDO
$dsn = 'mysql:host=localhost;dbname=aceenglish';
$username = 'root';
$password = 'sF@94pkgPB,';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa a la base de datos";
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}


//FUNCIONES
function hashContrasenia($contrasenia)
{
    return password_hash($contrasenia, PASSWORD_BCRYPT);
};

function coincidenContrasenias($contrasenia, $contraseniaBD)
{
    return password_verify($contrasenia, $contraseniaBD);
};



// SENTENCIAS
/* aqui voy a establecer 2 funciones que ejecuten un SELECT y un INSERT en la base de datos */

function login($conexion, $usuario, $contrasena)
{/*preparo la sentencia con un prepare y la ejecuto con un execute, cada registro se hace un fetch asociativo 
    y se almacena en una variable llamada "row". Despues se compara lo que has ingresado con el resultado 
    de la base de datos con la funcion password_verify y si es correcto te muestra el mensaje de bienvenida*/
    try {
        $stm = $conexion->prepare("SELECT * FROM alumno WHERE email = '$usuario'");
        $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        if (password_verify($contrasena, $row['contrasena'])) {
            session_start();
            echo "sesion inciada correctamente ";
        } else {
            echo "el usuario o contraseña no es correcto";
            echo "<br>";
            echo "<form action='index.php' method='post'><button type='submit' name='inicio'>Volver al inicio</button></form>";
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
        if ($contrasena1 == $contrasena2) {

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
