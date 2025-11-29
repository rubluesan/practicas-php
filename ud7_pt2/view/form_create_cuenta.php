<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
	<form action="../controller/create_cuenta_ctl.php" method='post'>
		<table border='1' cellpadding='2' cellspacing='2'>
			<tr>
				<td>Codigo</td>
				<td><input type='text' name='codigo' size='50' /></td>
			</tr>
			<tr>
				<td>Saldo</td>
				<td><input type='number' name='saldo' size='50' /></td>
			</tr>
			<tr>
				<td>Cliente</td>
				<td>
					<select name="cliente">
                        <?php 
                        foreach ($arrayClientes as $cliente) {
                        ?>
                        <option value="<?php echo $cliente->getId() ?>"><?php echo $cliente->getNombre()." ".$cliente->getApellidos() ?></option>
                        <?php
                        }
                        ?>
                    </select>
				</td>
			</tr>
		</table><br />
		<input type='submit' name='submit' value='Envia' />
	</form>
</body>

</html>