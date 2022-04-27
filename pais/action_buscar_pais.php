<?php
    include '../db/inicia_conexion.php';
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Registro de país</title>
</head>

<body>
<div align="center">
    <br>
    <font size="5">Busqueda de pais</font>
    <table border="1">
        <tr>
            <td><b>Nombre Pais</b></td>
            <td><b>Gentilicio</b></td>
            <td><b>Eliminar</b></td>
            <?php
            $nombrePais = $_POST["nombrePais"];
            $gentilicio = $_POST["gentilicio"];
            $sql = "select p.pais, p.nombre, p.gentilicio from pais p 
                    where p.nombre like '%{$nombrePais}' and p.gentilicio like '%{$gentilicio}%'";

            $resultados = mysqli_query($conexion, $sql);
            while ($fila = mysqli_fetch_array($resultados))
            {
                echo "<tr>";
                echo "<td>{$fila["nombre"]}</td>";
                echo "<td>". $fila["gentilicio"] ."</td>";
                echo "<td align='center'><a href='javascript:deleteItemUtil(" .$fila["pais"] . ");'><img src='../imagenes/delete_icon.png' width='15' border='0'></a></td>";
                echo "</tr>";
            }

            ?>
        </tr>
    </table>
    <br><br>
    <form name="fdelete" action="./delete_pais.php" method="POST">
        <input type="hidden" name="deleteItem">
    </form>

</div>

</body>

</html>

<script type="text/javascript" src="../js/deleteItemUtil.js">
</script>
