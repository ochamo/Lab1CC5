<?php
            include "./db/inicia_conexion.php"
?>
<html>

<head>
    <meta charset="utf-8">
    <title> Tienda en linea </title>
</head>

<body>
    <div align="center">
        <br>
        <font size="5"><b>Busqueda de usuarios</b></font>
        <br><br>
        <form name="fdatos" method="POST" action="./resultados_usuario.php">
            <table border="0">
                <tr>
                    <td>
                        <b>Nombres</b>
                    </td>
                    <td>
                        <input type="text" name="nombres">
                    </td>
                </tr>
                <tr>
                    <td><b>Apellidos</b></td>
                    <td>
                        <input type="text" name="apellidos">
                    </td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td>
                        <input type="email" name="email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Pais</b>
                    </td>
                    <td>
                        <select name="pais">
                            <option value="" selected></option>
                            <?PHP
                                $sql = "select pais, nombre from pais order by nombre";
                                $paises = mysqli_query($conexion, $sql);
                                while ($pais = mysqli_fetch_array($paises)) 
                                {
                                    echo '<option value="' . $pais["pais"] . '" selected>'. $pais["nombre"] .'</option>';
                                }
                                /*for($i = 1; $i < 10; $i++) {
                                    //echo '<option value="' .$i '" selected>'. $i .'</option>';
                                   echo "<option value='{$i}'>$i</option>";
                                }*/
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
            <input type="button" value="Regresar al menu" onClick="document.location = 'menu.php'; ">
            <input type="submit" value="Buscar">
        </form>
    </div>
</body>

</html>