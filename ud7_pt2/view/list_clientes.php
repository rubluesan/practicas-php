<table border="1">
    <tr>
        <th>CLIENTES: </h3>
        </th>
    </tr>
    <?php
    foreach ($arrayClientes as $cliente) {

        ?>
        <tr>
            <td><b>Cliente num: </td>
            <td><?php echo $cliente->getId(); ?></td>
            <td><a href="../controller/delete_cliente_ctl.php?id=<?php echo $cliente->getId() ?>">Eliminar</a></td>
        </tr>
        <tr>
            <td>DNI: </td>
            <td><?php echo $cliente->getDni(); ?></td>
            <td><a href="../controller/edit_cliente_ctl.php?id=<?php echo $cliente->getId() ?>">Editar</a></td>
        </tr>
        <tr>
            <td>Nombre: </td>
            <td><?php echo $cliente->getNombre(); ?></td>
        </tr>
        <tr>
            <td>Apellidos: </td>
            <td> <?php echo $cliente->getApellidos(); ?></td>
        </tr>
        <tr>
            <td>Fecha de Nacimiento: </td>
            <td> <?php echo date("d-m-Y", strtotime($cliente->getFechaN())); ?></td>
        </tr>
        
        <?php
    }
    ?>
</table>