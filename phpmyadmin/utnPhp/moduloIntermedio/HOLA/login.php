<?php include('header.php');
session_start();
if (isset($_SESSION['mensaje'])) {
    echo $_SESSION['mensaje'];
}
?>
<main>

    <section class="contenedor_cargar">
        <h2>Ingreso</h2>
        <form action="validar.php" method="post" class="formulario">

            <label for="usuario"> Usuario</label>
            <input type="text" name="usuario" placeholder="Usuario" required>

            <label for="clave"> Contaseña</label>
            <input type="password" name="clave" placeholder="Contraseña" required><br>

            <button type="submit">Ingresar</button>

        </form>

        <?php
        if (isset($_GET['error'])) {
            echo "<h1>Ups, hubo un error, volve a intentarlo por favor.</h1>";
        } elseif (isset($_GET['exit'])) {
            echo "<h1>Te deslogueaste exitosamente</h1>";
        }
        ?>
    </section>
</main>

<footer>
    <p><?php echo "Hoy es: " . date('d-m-y') . "."; ?> TRABAJO PRÁCTICO PHP</p>
</footer>

</body>

</html>