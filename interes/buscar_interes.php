<html>
    <head>
        <meta charset="utf-8">
        <title>Buscar interes</title>
    </head>
    <body>
        <div align="center">
            <br>
            <font size="5"><b>Busqueda interes</b></font>
            <br><br>
            <form name="fdatos" method="POST" action="./action_buscar_interes.php">
                <table border="0">
                    <tr>
                        <td>
                            <b>Descripción</b>
                        </td>
                        <td>
                            <input type="text" name="nombreInteres">
                        </td>
                    </tr>
                </table>
                <input type="button" value="Regresar al menu" onClick="document.location = '../menu.php'; ">
                <input type="submit" value="Buscar">
            </form>
        </div>
    </body>
</html>