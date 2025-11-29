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

$msg = null;
try {

	// si venimos de hacer submit al formulario, tenemos que crear el objeto cuenta y persistirlo a la BDD
	if (isset($_REQUEST['submit'])) {
		// vamos a crear una cuenta
		// inicialmente todos sus parámetros son null
		// después le asignaremos los valores recibidos del formulario
		$cuenta = new cuenta(null, null, null);

		if (isset($_REQUEST['codigo'])) {
			$cuenta->setCodigo($_REQUEST['codigo']);
		}

		if (isset($_REQUEST['saldo'])) {
			$cuenta->setSaldo($_REQUEST['saldo']);
		}

		if (isset($_REQUEST['cliente'])) {
			$cuenta->setCliente($_REQUEST['cliente']);
		}

		$resultado = $cuentaDAO->inserir($cuenta);

		// el método inserir retorna false en caso de error
		if ($resultado) {
			$msg = "Datos introducidos correctamente!!";
		}

		// si no venimos de hacer submit, mostramos el formulario al usuario
	} else {
		$arrayClientes = $clienteDAO->verClientes();
		require_once '../view/form_create_cuenta.php';
	}
} catch (Exception $e) {
	$msg = "Error al introducir los datos .$e";
}

if ($msg != null) {
	printMsg($msg);
}

linkInicio();
?>