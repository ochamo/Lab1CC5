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
            $interesId = $_POST["deleteItem"];
            $sql = "delete from usuario_interes where interes = {$interesId}";
            $status = mysqli_query($conexion, $sql);
            $sql = "delete from interes where interes = {$interesId}";
            $status = mysqli_query($conexion, $sql);

            if ($status) {
                echo "Proceso realizado con exito";
            } else {
                echo "<font color='red'><b>Sucedio un error</b></font>";
            }

            ?>
            <br>
            <br>
            <a href="../menu.php">Regresar al menu</a>
        </div>
    </body>

<html>
