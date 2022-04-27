<?php
    include "./db/inicia_conexion.php";
?>
<html>

<head>
    <meta charset="utf-8">
    <title> Tienda en linea </title>
</head>

<body>
<div align="center">
    <?PHP
        $sql = "delete from usuario_interes where usuario = " . $_POST["deleteItem"];
        $status = mysqli_query($conexion, $sql);
        $sql = "delete from usuario where usuario = " . $_POST["deleteItem"];
        $status = mysqli_query($conexion, $sql);

        if ($status) {
            echo "Proceso realizado con exito";
        } else {
            echo "<font color='red'><b>Sucedio un error</b></font>";
        }

    ?>
    Proceso realizado con exito <br><br>
    <a href = "buscar_usuario.php"> Buscar Usuario </a> &nbsp&nbsp;&nbsp;&nbsp; <a href="">
</div>
</body>

</html>
