<?php
require_once '../config/config.inc.php';
require_once '../model/business/class_cliente.php';
require_once '../model/persistence/class_clienteDAO.php';
require_once '../view/printMsg.php';
require_once '../view/linkInicio.php';

$clienteDAO = new clienteDAO();

$msg = null;
try {

    // si venimos de hacer submit al formulario, tenemos que crear el objeto cliente y persistirlo a la BDD
    if (isset($_REQUEST['submit'])) {
        // vamos a crear un cliente
        // inicialmente todos sus parámetros son null
        // después le asignaremos los valores recibidos del formulario
        $cliente = new cliente(null, null, null,null);

        if (isset($_REQUEST['dni'])) {
            $cliente->setDni($_REQUEST['dni']);
        }

        if (isset($_REQUEST['nombre'])) {
            $cliente->setNombre($_REQUEST['nombre']);
        }

        if (isset($_REQUEST['apellidos'])) {
            $cliente->setApellidos($_REQUEST['apellidos']);
        }

        if (isset($_REQUEST['fechaN'])) {
            $cliente->setFechaN($_REQUEST['fechaN']);
        }

        $resultado = $clienteDAO->inserir($cliente);

        // el método inserir retorna false en caso de error
        if ($resultado) {
            $msg = "Datos introducidos correctamente!!";
        }

        // si no venimos de hacer submit, mostramos el formulario al usuario
    } else {
        require_once '../view/form_create_cliente.php';
    }
} catch (Exception $e) {
    $msg = "Error al introducir los datos .$e";
}

if ($msg != null) {
    printMsg($msg);
}

linkInicio();
?>