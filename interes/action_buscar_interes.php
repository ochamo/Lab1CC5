<?php
    include '../db/inicia_conexion.php';
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Buscar interes</title>
    </head>
    <body>
        <div align="center">
            <br>
            <font size="5"><b>Busqueda de interes</b></font>
            <br>
            <br>
            <table border="1">
                <tr>
                    <td><b>Interes Cod.</b></td>
                    <td><b>Descripcion interes</b></td>
                    <td><b>Eliminar</b></td>
                    <?php
                    $descripcion = $_POST["descripcion"];
                    $sql = "select i.interes, i.descripcion from interes i where i.descripcion like '%{$descripcion}'";
                    $resultados = mysqli_query($conexion, $sql);
                    while ($fila = mysqli_fetch_array($resultados))
                    {
                        echo "<tr>";
                        echo "<td>{$fila["interes"]}</td>";
                        echo "<td>". $fila["descripcion"] ."</td>";
                        echo "<td align='center'><a href='javascript:eliminar(" .$fila["interes"] . ");'><img src='../imagenes/delete_icon.png' width='15' border='0'></a></td>";
                        echo "</tr>";
                    }

                    ?>
                </tr>
            </table>
            <br><br>
            <form name="fdelete" action="./delete_pais.php" method="POST">
                <input type="hidden" name="paisId">
            </form>
        </div>
    </body>
</html>
