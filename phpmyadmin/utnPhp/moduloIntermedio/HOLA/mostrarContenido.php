<?php include('header.php');
if (isset($_GET['ok'])) {
    echo "<h3>Iniciaste sesion correctamente!</h3>";
}
if (isset($_GET['borrar'])) {
    echo "<h3>Se borro exitosamente!</h3>";
}
if (isset($_GET['error'])) {
    echo "<h3>Ups, hubo un error, volve a intentarlo por favor.</h3>";
}
if (isset($_SESSION['mensaje'])) {
    echo $_SESSION['mensaje'];
}
?>
<main>
    <h2>Listado de Usuarios</h2>
    <section class="usuarios">
        <?php
        include("conexionDB.php");
        $consulta = "SELECT * FROM usuarios";
        $resultado = mysqli_query($conexion_db, $consulta);
        while ($mostrar_datos = mysqli_fetch_assoc($resultado)) {
        ?>
            <div class="caja_usuarios">
                <h3> <?php echo "Nombre: " .  $mostrar_datos['nombre']; ?> </h3>
                <h4> <?php echo "¿Donde vive? " . "<br>" . $mostrar_datos['lugar'] . "<br>"
                            . "¿Cuánta luz hay en tu casa? " . "<br>" . $mostrar_datos['pregunta1'] . "<br>"
                            . "¿Cada cuánto regas? " . "<br>" .  $mostrar_datos['pregunta2'] . "<br>"
                            . "¿Qué clima predomina? " . "<br>" .  $mostrar_datos['pregunta3']; ?> </h4><br>

                <img src="imagenes/<?php echo $mostrar_datos['imagen'] ?>" alt="<?php echo $mostrar_datos['nombre'] ?>">

                <p><a href="eliminar.php?id=<?php echo $mostrar_datos['id']; ?>">Eliminar</a></p><br>
                <h3> Estado: <?php echo $mostrar_datos['estado']; ?></h3>
                <a href="editar_estado.php?id=<?php echo $mostrar_datos['id']; ?>"> Finalizar</a>
            </div>
        <?php }   ?>
    </section>
</main>
<footer>
    <p><?php echo "Hoy es: " . date('d-m-y') . "."; ?> TRABAJO PRÁCTICO PHP</p>
</footer>
</body>

</html>