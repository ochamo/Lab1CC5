<?php
include "./db/inicia_conexion.php";

$queryItem = $_POST["queryItem"];

$sql = "select usuario, nombres, apellidos, dpi, email, pais, direccion, telefono, sexo, fecha_nacimiento from usuario
 where usuario = {$queryItem};
";

$resultados = mysqli_query($conexion, $sql);

while($fila = mysqli_fetch_array($resultados)) {
    $nombres = $fila["nombres"];
    $apellidos = $fila["apellidos"];
    $dpi = $fila["dpi"];
    $email = $fila["email"];
    $pais = $fila["pais"];
    $direccion = $fila["direccion"];
    $telefono = $fila["telefono"];
    $sexo = $fila["sexo"];
    $fechaNacimiento = $fila["fecha_nacimiento"];
}



?>
<html>

<head>
    <meta charset="utf-8">
    <title> Consulta de usuarios </title>
</head>

<body>
<div align="center">
    <br>
    <font size="5"><b>Ingrese sus datos</b></font>
    <br><br>
    <form name="fdatos" method="POST" action="update_usuariox.php">
        <input type="hidden" name="usuario" value='<?= $_POST["queryItem"]; ?>'>
        <table border="0">
            <tr>
                <td>
                    <b>Nombres</b>
                </td>
                <td>
                    <input type="text" name="nombres" value="<?= $nombres?>">
                </td>
            </tr>
            <tr>
                <td><b>Apellidos</b></td>
                <td>
                    <input type="text" name="apellidos" value="<?= $apellidos?>">
                </td>
            </tr>
            <tr>
                <td><b>DPI</b></td>
                <td>
                    <input type="text" name="dpi" value="<?= $dpi ?>">
                </td>
            </tr>
            <tr>
                <td><b>Email</b></td>
                <td>
                    <input type="email" name="email" value="<?= $email?>">
                </td>
            </tr>
            <tr>
                <td>
                    <b>Pais</b>
                </td>
                <td>
                    <select name="pais">
                        <?PHP
                        $sql = "select pais, nombre from pais order by nombre";
                        $paises = mysqli_query($conexion, $sql);
                        while ($paisArray = mysqli_fetch_array($paises))
                        {
                            $strsel = "";
                            if ($pais == $paisArray["pais"]) {
                                $strsel = "selected";
                            }
                            echo '<option value="' . $paisArray["pais"] . '" ' . $strsel . '>'. $paisArray["nombre"] .'</option>';

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
                    <textarea name="direccion" cols="30" rows="3"><?= $direccion?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <b>Telefono</b>
                </td>
                <td>
                    <input name="telefono" cols="30" rows="3" value="<?= $telefono?>"></input>
                </td>
            </tr>
            <tr>
                <td>
                    <b>Sexo</b>
                </td>
                <td>
                    <?php
                        $checkM = "";
                        $checkF = "";
                        if ($sexo == "M") {
                            $checkM = "checked";
                        } else {
                            $checkF = "checked";
                        }
                    ?>
                    <input type="radio" name="sexo" value="M" <?= $checkM ?>>Masculino &nbsp;&nbsp;
                    <input type="radio" name="sexo" value="F" <?= $checkF ?>>Feminino
                </td>
            </tr>
            <tr>
                <td><b>Fecha nacimiento:</b></td>
                <td><input type="date" name="fecha_nacimiento" value="<?= $fechaNacimiento?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <br><b>Seleccione sus intereses</b><br><br>
                    <table>
                        <?php
                        $sql = "select i.interes, i.descripcion, ui.interes as seleccionado from interes i left outer join  
                                usuario_interes ui on i.interes = ui.interes and ui.usuario = {$queryItem}";
                        $resultados = mysqli_query($conexion, $sql);
                        $i = 1;
                        while ($fila = mysqli_fetch_array($resultados))
                        {
                            if ($i == 1) {
                                echo "<tr>";
                            }

                            $check = "";
                            if (!is_null($fila["seleccionado"])) {
                                $check = "checked";
                            }

                            echo '<td>';
                            echo '<input type="checkbox" name="interes[]" value="'. $fila["interes"] .'" ' .$check . '>' . $fila["descripcion"];
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