<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("conexionDB.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   /* if ($_POST['captcha'] != ($_SESSION['num1'] + $_SESSION['num2'])) {
        header("Location:index.php?ERCaptcha");
    }
    */
    $nombre = $_POST["nombre"];
    $lugar = $_POST["lugar"];
    $pregunta1 = $_POST["pregunta1"];
    $pregunta2 = $_POST["pregunta2"];
    $pregunta3 = $_POST["pregunta3"];
    $estado = 'Procesando';

    $nombre_img = $_FILES['imagen']['name'];
    $tamanio_img = $_FILES['imagen']['size'];
    $tipo_img = $_FILES['imagen']['type'];
    $tmp_img = $_FILES['imagen']['tmp_name'];

    $destino = 'imagenes/' . $nombre_img;

    if (($tipo_img != 'image/jpeg' && $tipo_img != 'image/jpg' && $tipo_img != 'image/png' && $tipo_img != 'image/gif') or $tamanio_img > 200000) {
        header("Location: index.php?error");
    } else {
        move_uploaded_file($tmp_img, $destino);
        $resultado = mysqli_query($conexion_db, "INSERT INTO usuarios (nombre, lugar, pregunta1, pregunta2, pregunta3, estado, imagen) VALUES ('$nombre', '$lugar', '$pregunta1', '$pregunta2', '$pregunta3', '$estado', '$nombre_img')");
    }
    // Verificar si hubo algún error en la ejecución de la consulta
    if (!$resultado) {
        header("Location: index.php?error");
    } else {
        header("Location: index.php?ok");
    }
} else {
    header("Location: index.php?error");
}
