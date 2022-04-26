<html>
<head>
    <meta charset="utf-8">
    <title>Buscar pais</title>
</head>
<body>
    <div align="center">
        <br>
        <font size="5"><b>Busqueda de pais</b></font>
        <br><br>
        <form name="fdatos" method="POST" action="./action_buscar_pais.php">
            <table border="0">
                <tr>
                    <td>
                        <b>Nombre pais</b>
                    </td>
                    <td>
                        <input type="text" name="nombrePais">
                    </td>
                </tr>
                <tr>
                    <td><b>Gentilicio</b></td>
                    <td>
                        <input type="text" name="gentilicio">
                    </td>
                </tr>
            </table>
            <input type="button" value="Regresar al menu" onClick="document.location = '../menu.php'; ">
            <input type="submit" value="Buscar">
        </form>
    </div>
</body>
</html>
