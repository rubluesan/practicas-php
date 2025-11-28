<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
    <h2>Edición de <?php echo $cliente->getNombre()?></h2>
    <form action="../controller/edit_cliente_ctl.php" method='post'>
        <table border='1' cellpadding='2' cellspacing='2'>
            <tr>
                <td>Id</td>
                <td><input type='text' name='id' value="<?php echo $cliente->getId() ?>" size='50' readonly/></td>
            </tr>
            <tr>
                <td>DNI</td>
                <td><input type='text' name='dni' value="<?php echo $cliente->getDni() ?>" size='50' /></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><input type='text' name='nombre' value="<?php echo $cliente->getNombre() ?>" size='50' /></td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td><input type='text' name='apellidos' value="<?php echo $cliente->getApellidos() ?>" size='50' /></td>
            </tr>
            <tr>
                <td>Fecha de nacimiento</td>
                <td><input type='date' name='fechaN' value="<?php echo $cliente->getFechaN() ?>" size='50' /></td>
            </tr>
        </table><br />
        <input type='submit' name='submit' value='Modifica' />
    </form>
</body>

</html>