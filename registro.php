<?php
            include "./db/inicia_conexion.php"
?>
<html>

<head>
    <meta charset="utf-8">
    <title> Bienvenido - Registrate </title>
</head>

<body>
    <div align="center">
        <br>
        <font size="5"><b>Ingrese sus datos</b></font>
        <br><br>
        <form name="fdatos" method="POST" action="registro_insert.php">
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
                    <td><b>DPI</b></td>
                    <td>
                        <input type="text" name="dpi">
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
                <tr>
                     <td>
                        <b>Dirección</b>
                    </td>
                    <td>
                        <textarea name="direccion" cols="30" rows="3"></textarea>
                    </td>
                </tr>
                <tr>
                     <td>
                        <b>Telefono</b>
                    </td>
                    <td>
                        <input name="telefono" cols="30" rows="3"></input>
                    </td>
                </tr>
                <tr>
                     <td>
                        <b>Sexo</b>
                    </td>
                    <td>
                        <input type="radio" name="sexo" value="M">Masculino &nbsp;&nbsp;
                        <input type="radio" name="sexo" value="F">Feminino
                    </td>
                </tr>
                <tr>
                    <td><b>Fecha nacimiento:</b></td>
                    <td><input type="date" name="fecha_nacimiento"></td>
                </tr>
                <tr>
                    <td><b>Clave</b></td>
                    <td><input name="clave" type="password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br><b>Seleccione sus intereses</b><br><br>
                        <table>
                            <?php
                                $sql = "select interes, descripcion from interes order by descripcion";
                                $resultados = mysqli_query($conexion, $sql);
                                $i = 1;
                                while ($fila = mysqli_fetch_array($resultados))
                                {
                                    if ($i == 1) {
                                        echo "<tr>";
                                    }
                                    echo '<td>';
                                    echo '<input type="checkbox" name="interes[]" value="'. $fila["interes"] .'">' . $fila["descripcion"];
                                    echo '</td>';
                                    if ($i==3) {
                                        echo "</tr>";
                                        $i = 0;
                                    }
                                }
                                if ($i != 1) {
                                    echo "</tr>";
                                }
                            ?>
                        </table>
                    </td>
                </tr>
            </table>
            <input type="submit" value="Registrarme">
        </form>
    </div>
</body>

</html>