<?php
    include "./db/inicia_conexion.php";
?>
<html>

<head>
    <meta charset="utf-8">
    <title> Bienvenido - Registrate </title>
</head>

<body>
<div align="center">
    <?php
    echo $_POST["nombres"] . "<br>";
    echo $_POST["apellidos"] . "<br>";
    echo $_POST["dpi"] . "<br>";
    echo $_POST["email"] . "<br>";
    echo $_POST["pais"] . "<br>";
    echo $_POST["direccion"] . "<br>";
    echo $_POST["telefono"] . "<br>";
    echo $_POST["sexo"] . "<br>";
    echo $_POST["clave"] . "<br>";
    echo $_POST["fecha_nacimiento"] . "<br>";

    $sql = "insert into usuario(nombres, apellidos, direccion, telefono, sexo,
                    fecha_nacimiento, email, clave, pais, dpi)
            values('". $_POST['nombres']."', '". $_POST['apellidos'] ."', 
            '". $_POST["direccion"] ."', '". $_POST['telefono']."',
            '". $_POST['sexo']."', '". $_POST['fecha_nacimiento']."', '". $_POST['email']."',
            '". $_POST['clave']."', '". $_POST['pais']."', '". $_POST['dpi']."'
            )
            ";

    $status = mysqli_query($conexion, $sql);

    if($status)
    {
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
