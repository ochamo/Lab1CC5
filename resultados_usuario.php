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
        <table border="1">
            <tr>
                <td><b>Nombres:</b></td>
                <td><b>Apellidos:</b></td>
                <td><b>Email:</b></td>
                <td><b>Pais:</b></td>                
                <td><b>Sexo:</b></td>
                <td><b>Consultar:</b></td>
                <td><b>Eliminar:</b></td>
                
                <?php

                     $sql = "select u.usuario, u.nombres, u.apellidos, u.email, p.nombre as pais, u.sexo 
                     from usuario u, pais p where u.pais = p.pais and u.nombres like '%" .$_POST["nombres"] . "'
                      and u.apellidos like '%" . $_POST["apellidos"] . "' 
                      and u.email like '%" . $_POST["email"] . "%'  
                     ";
                    
                     if ($_POST["pais"] != "")
                     {
                         $sql = $sql . " and p.pais = " . $_POST["pais"];
                     }
                    
                     $resultados = mysqli_query($conexion, $sql);
                    while ($fila = mysqli_fetch_array($resultados)) 
                    {
                        echo "<tr>";
                        echo "<td>{$fila["nombres"]}</td>";
                        echo "<td>". $fila["apellidos"] ."</td>";
                        echo "<td>ll@gmail.com</td>";
                        echo "<td>Guatemala</td>";
                        

                        if ($fila["sexo"] == "M") {
                            echo "<td>Masculino</td>";
                        } else {
                            echo "<td>Femenino</td>";
                        }
                        echo "<td align='center'><img src='./imagenes/edit_icon.png' width='15'></td>";
                        echo "<td align='center'><a href='javascript:eliminar(" .$fila["usuario"] . ");'><img src='./imagenes/delete_icon.png' width='15' border='0'></a></td>";
                        echo "</tr>";
                    }
                    
                ?>
            </tr>
        </table>
        <br><br>
            <input type="button" value="Regresar al menu" onClick="document.location = 'menu.php'; ">
            <input type="button" value="Nueva busqueda" onClick="document.location = 'menu.php'; ">
        <form name="fdelete" action="delete_usuario.php" method="POST">
            <input type="hidden" name="usuario">
        </form>
    </div>
</body>
</html>
<script language="javascript">
    function eliminar(pid) 
    {
        document.fdelete.usuario.value = pid;
        respuesta = confirm("¿Está seguro de borrar el registro?");
        if (respuesta) 
        {
            document.fdelete.submit();
        }
    }
 </script>