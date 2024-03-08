<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('header.php');
//$_SESSION["num1"] = rand(0, 10);
//$_SESSION["num2"] = rand(0, 10);
?>
<main>
    <form action="procesar_datos.php" method="POST" class="formulario" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="lugar">¿De donde sos?:</label>
        <input type="text" name="lugar" required><br>

        <label for="pregunta1">¿Cuánta luz hay en tu casa?</label>
        <select name="pregunta1" required>
            <option value="Mucha luz">Mucha luz</option>
            <option value="Poca luz">Poca luz</option>
            <option value="Nada luz">Nada de luz</option>
        </select><br>

        <label for="pregunta2">¿Cada cuánto regas?</label>
        <select name="pregunta2" required>
            <option value="Todos los dias">Todos los dias</option>
            <option value="Dia por medio">Dia por medio</option>
            <option value="Casi nunca">Casi nunca</option>
        </select><br>
        <label for="pregunta3">¿Qué clima predomina donde vivis?</label>
        <select name="pregunta3" required>
            <option value="Humedo">Humedo</option>
            <option value="Frio">Frio</option>
            <option value="Calido">Calido</option>
        </select><br>

        <label for="imagen">Subi la foto de tu planta preferida:</label>
        <input type="file" name="imagen" required><br>
<!--
        <label for="captcha">Solucione el siguiente calculo para validar sus datos:<br><?php echo $_SESSION["num1"]; ?> + <?php echo $_SESSION["num2"]; ?> = ?</label>
        <input type="number" name="captcha" required>
-->
        <button type="submit">Enviar</button>
    </form>
    <?php
    if (isset($_GET['ok'])) {
        echo "<h1>Se envió tu información correctamente, pronto recibirás novedades!</h1>";
    } elseif (isset($_GET['error'])) {
        echo "<h1>Ups, hubo un error, volve a intentarlo por favor</h1>";
    }
    /*elseif (isset($_GET['ERCaptcha'])) {
        echo "<h1>Resultado de calculo incorrecto, volve a intentarlo</h1>";
    }*/
    ?>

</main>

<footer>
    <p><?php echo "Hoy es: " . date('d-m-y') . "."; ?> TRABAJO PRÁCTICO PHP</p>
</footer>

</body>

</html>