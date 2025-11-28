<?php
require_once '../config/config.inc.php';
require_once '../model/business/class_cliente.php';
require_once '../model/persistence/class_clienteDAO.php';
require_once '../view/printMsg.php';
require_once '../view/linkInicio.php';

$clienteDAO = new clienteDAO();

// comprobamos si la cuenta existe antes de eliminarla
if (isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
	$cliente = $clienteDAO->buscarId($id);
}

$msg = null;
try {
	if (isset($_REQUEST['submit'])) {
		if ($cliente != null) {
			if ($_REQUEST['dni']) {
				$cliente->setDni($_REQUEST['dni']);
			}
			if ($_REQUEST['nombre']) {
				$cliente->setNombre($_REQUEST['nombre']);
			}
			if ($_REQUEST['apellidos']) {
				$cliente->setApellidos($_REQUEST['apellidos']);
			}
            if ($_REQUEST['fechaN']) {
				$cliente->setFechaN($_REQUEST['fechaN']);
			}

			$resultado = $clienteDAO->editar($cliente);

			if ($resultado) {
				$msg = "Datos modificados correctamente";
			}
			require_once "../view/linkInicio.php";
		} else {
			$msg = "No se ha podido modificar, la cuenta no existe";
		}
	} else {
		require_once "../view/form_edit_cliente.php";
	}
} catch (Exception $e) {
	$msg = "Error al editar los datos .$e";
}

if ($msg != null) {
	printMsg($msg);
}

linkInicio();
?>