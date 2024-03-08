<?php
session_start();
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

include('conexionDB.php');

$consulta = mysqli_query($conexion_db, " SELECT * FROM administradores WHERE usuario = 'admin' AND clave = 'admin123'");

if ($usuario == 'admin' && $clave == 'admin123') {
    $_SESSION['admin'] = $usuario;
    header('Location: mostrarContenido.php?ok');
} else {
    header('Location: login.php?error');
}
