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
        <?PHP
            $descripcion = $_POST["descripcionInteres"];
            $sql = "insert into interes(descripcion) values('{$descripcion}')";

            $status = mysqli_query($conexion, $sql);

            if ($status) {
                echo "<div align='center'>";
                echo "Interes creado exitosamente<br><br>";
                echo "<a href='../menu.php'>Regresar al menu</a>";
                echo "</div>";
            } else {
                echo "error al crear interes";
                echo mysqli_errno($conexion);
            }

        ?>
    </div>
</body>
</html>
