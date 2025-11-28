<?php
require_once '../config/config.inc.php';
require_once '../model/business/class_cuenta.php';
require_once '../model/persistence/class_cuentaDAO.php';
require_once '../view/printMsg.php';
require_once '../view/linkInicio.php';

$cuentaDAO = new clienteDAO();

// comprobamos si la cuenta existe antes de eliminarla
if (isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
	$cuenta = $cuentaDAO->buscarId($id);
}

$msg = null;
try {

	if ($cuenta != null) {
		$resultado = $cuentaDAO->eliminar($id);

		// el método eliminar retorna false en caso de error
		if ($resultado) {
			$msg = "Datos eliminados correctamente!!";
		}

	} else {
		$msg = "No se ha podido eliminar. La cuenta no existe";
	}

} catch (Exception $e) {
	$msg = "Error al eliminar los datos .$e";
}

if ($msg != null) {
	printMsg($msg);
}

linkInicio();
?>