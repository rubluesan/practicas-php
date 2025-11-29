<?php
require_once '../config/config.inc.php';
require_once '../model/business/class_cuenta.php';
require_once '../model/persistence/class_cuentaDAO.php';
require_once '../model/business/class_cliente.php';
require_once '../model/persistence/class_clienteDAO.php';
require_once '../view/printMsg.php';
require_once '../view/linkInicio.php';

$cuentaDAO = new cuentaDAO();
$clienteDAO = new clienteDAO();

// comprobamos si la cuenta existe antes de editarla
if (isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
	$cuenta = $cuentaDAO->buscarId($id);
	$arrayClientes = $clienteDAO->verClientes();
}

$msg = null;
try {
	if (isset($_REQUEST['submit'])) {
		if ($cuenta != null) {
			if ($_REQUEST['codigo']) {
				$cuenta->setCodigo($_REQUEST['codigo']);
			}
			if ($_REQUEST['saldo']) {
				$cuenta->setSaldo($_REQUEST['saldo']);
			}
			if ($_REQUEST['cliente']) {
				$cuenta->setCliente($_REQUEST['cliente']);
			}

			$resultado = $cuentaDAO->editar($cuenta);

			if ($resultado) {
				$msg = "Datos modificados correctamente";
			}
			require_once "../view/linkInicio.php";
		} else {
			$msg = "No se ha podido modificar, la cuenta no existe";
		}
	} else {
		require_once "../view/form_edit_cuenta.php";
	}
} catch (Exception $e) {
	$msg = "Error al editar los datos .$e";
}

if ($msg != null) {
	printMsg($msg);
}

linkInicio();
?>