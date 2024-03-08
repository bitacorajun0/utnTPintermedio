<?php
$conexion_db = mysqli_connect("localhost", "root", "1234", "utnPhp");
if (!$conexion_db) {
    exit("Error: No se pudo conectar a la base de datos. " . mysqli_connect_error());
}
// Verificar si la tabla 'usuarios' existe
$consulta_tabla = "SHOW TABLES LIKE 'usuarios'";
$resultado_tabla = mysqli_query($conexion_db, $consulta_tabla);

if (!$resultado_tabla) {
    exit("Error: No se pudo ejecutar la consulta. " . mysqli_error($conexion_db));
}
// Si la tabla 'usuarios' no existe, crearla
if (mysqli_num_rows($resultado_tabla) == 0) {
    $sql_usuarios = "CREATE TABLE usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50)NOT NULL,
        lugar VARCHAR(50)NOT NULL,
        pregunta1 VARCHAR(15)NOT NULL,
        pregunta2 VARCHAR(15)NOT NULL,
        pregunta3 VARCHAR(15)NOT NULL,
        estado VARCHAR(15)NOT NULL,
        imagen LONGBLOB NOT NULL
    )";

    if (mysqli_query($conexion_db, $sql_usuarios)) {
        echo "Tabla 'usuarios' creada con éxito.";
    } else {
        echo "Error al crear la tabla 'usuarios': " . mysqli_error($conexion_db);
    }
}
