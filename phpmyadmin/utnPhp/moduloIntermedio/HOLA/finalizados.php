<?php
session_start();
if (!isset($_SESSION['admin'])) {
    $_SESSION['mensaje'] = '<h1>Es necesario iniciar sesión para acceder a esta funcionalidad</h1>';
    header('Location: login.php');
    exit();
}
include('header.php');
?>
<main>
    <h2>Finalizados</h2>
    <section class="usuarios">
        <?php
        include("conexionDB.php");
        $consulta = "SELECT * FROM usuarios WHERE estado = 'finalizado'";
        $resultado = mysqli_query($conexion_db, $consulta);
        while ($mostrar_datos = mysqli_fetch_assoc($resultado)) {
        ?>
            <div class="caja_usuarios">

                <h3> <?php echo "Nombre: " .  $mostrar_datos['nombre']; ?> </h3>
                <h4> <?php echo "¿Donde vive? " . "<br>" . $mostrar_datos['lugar'] . "<br>"
                            . "¿Cuánta luz hay en tu casa? " . "<br>" . $mostrar_datos['pregunta1'] . "<br>"
                            . "¿Cada cuánto regas? " . "<br>" .  $mostrar_datos['pregunta2'] . "<br>"
                            . "¿Qué clima predomina? " . "<br>" .  $mostrar_datos['pregunta3']; ?> </h4>
                <img src="imagenes/<?php echo $mostrar_datos['imagen'] ?>" alt="<?php echo $mostrar_datos['nombre'] ?>">
                <h3> Estado: <?php echo $mostrar_datos['estado']; ?></h3>

            </div>
        <?php }   ?>
    </section>
</main>

<footer>
    <p><?php echo "Hoy es: " . date('d-m-y') . "."; ?> TRABAJO PRÁCTICO PHP</p>
</footer>

</body>

</html>