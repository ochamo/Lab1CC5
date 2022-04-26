<?php
    include "../db/inicia_conexion.php";
?>

<html>
<head>
    <meta charset="utf-8">
    <title> Registro de país </title>
</head>

<body>
<?php
    $nombrePais = $_POST["nombrePais"];
    $gentilicio = $_POST["gentilicio"];
    $sql = "insert into pais(nombre, gentilicio) VALUES('{$nombrePais}', '{$gentilicio}')";

    $status = mysqli_query($conexion, $sql);

    if ($status) {
        echo "
        <div align='center'>
        Pais creado exitosamente.
        <a href='../menu.php'>Regresar al menu</a>
        </div>";
    } else {
        echo "error al crear pais";
        echo mysqli_errno($conexion);
    }

?>
</body>

</html>
