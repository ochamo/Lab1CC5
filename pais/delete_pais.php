<?php
    include '../db/inicia_conexion.php';
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Tienda en linea</title>
    </head>

    <body>
        <div align="center">
            <?php
            $pais = $_POST["paisId"];
            $sql = "delete from usuario where pais = {$pais}";
            $status = mysqli_query($conexion, $sql);
            $sql = "delete from pais where pais = {$pais}";
            $status = mysqli_query($conexion, $sql);

            if ($status) {
                echo "Proceso realizado con exito";
            } else {
                echo "<font color='red'><b>Sucedio un error</b></font>";
            }

            ?>
            <br><br>
            <a href="../menu.php">Regresar al menu</a>
        </div>
    </body>

</html>
