<?php
session_start();
if (!isset($_SESSION['admin'])) {
    $_SESSION['mensaje'] = '<h1>Es necesario iniciar sesión para acceder a esta funcionalidad</h1>';
    header("Location: login.php");
    exit();
}

include("conexionDB.php");

$id_usuario = $_GET['id'];
$resultado = mysqli_query($conexion_db, "UPDATE usuarios SET estado = 'Finalizado' WHERE id=$id_usuario");
if (!$resultado) {
    header("Location: mostrarContenido.php?error");
} else {
    header("Location: mostrarContenido.php");
}
