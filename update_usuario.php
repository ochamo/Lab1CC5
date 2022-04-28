<?php
include "./db/inicia_conexion.php";
?>
<html>

<head>
    <meta charset="utf-8">
    <title> Consulta de usuarios </title>
</head>

<body>
<div align="center">
    <?php
    $nombres =  $_POST["nombres"] ;
    $apellidos =  $_POST["apellidos"];
    $dpi =  $_POST["dpi"] ;
    $email = $_POST["email"];
    $pais = $_POST["pais"] ;
    $direccion = $_POST["direccion"];
    $telefono =  $_POST["telefono"] ;
    $sexo =  $_POST["sexo"] ;
    $clave =  $_POST["clave"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $usuario = $_POST["usuario"];


    $sql = "update usuario set
                nombres = {$nombres},
                apellidos = {$apellidos},
                direccion = {$direccion},
                telefono = {$telefono},
                sexo = {$sexo},
                fecha_nacimiento = {$fecha_nacimiento}
                email = {$email},
                pais = {$pais},
                dpi = {$dpi}
                where usuario = {$usuario}
            ";

    $status = mysqli_query($conexion, $sql);

    if($status)
    {
        $sql = "delete from usuario_interes where usuario = {$usuario}";
        $status = mysqli_query($conexion, $sql);
        $usuario = mysqli_insert_id($conexion);
        foreach ($_POST["interes"] as $valor) {
            $sql = "insert into usuario_interes(usuario, interes)
            values(" . $usuario . ", " . $valor . ")
            ";
            mysqli_query($conexion, $sql);
        }
    }
    else
    {
        echo mysqli_errno($conexion);
    }

    ?>

</div>
</body>

</html>
