<?php
include("conexionDB.php");
session_start();

    $nombre_per = $_POST["nombre"];
    $apellido_per = $_POST["apellido"];
    // $imagen_per = $_POST["imagen"];
    $descripcion_per = $_POST["descripcion"];
    $estado_per = $_POST["estado"];

    $nombre_img = $_FILES['imagen']['name'];
    $tamanio_img = $_FILES['imagen']['size'];
    $tipo_img = $_FILES['imagen']['type'];
    $tmp_img = $_FILES['imagen']['tmp_name'];

    $destino = 'imagenes/' . $nombre_img;

    if (($tipo_img != 'image/jpeg' && $tipo_img != 'image/jpg' && $tipo_img != 'image/png' && $tipo_img != 'image/gif') or $tamanio_img > 200000) {
        header("Location: cargar.php?error");
    } else {
        move_uploaded_file($tmp_img, $destino);
        mysqli_query($conexion_db, "INSERT INTO personajes VALUES (DEFAULT, '$nombre_per', '$apellido_per', '$nombre_img', '$descripcion_per', '$estado_per')");
        header("Location:cargar.php?ok");
    } 

