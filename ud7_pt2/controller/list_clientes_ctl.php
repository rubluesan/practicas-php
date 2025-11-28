<?php
	require_once '../config/config.inc.php';
	require_once '../model/business/class_cliente.php';
	require_once '../model/persistence/class_clienteDAO.php';
	require_once '../view/linkInicio.php';

	$clienteDAO = new clienteDAO();

	$arrayClientes = $clienteDAO->verClientes();

	require_once '../view/list_clientes.php';

	linkInicio();
?>