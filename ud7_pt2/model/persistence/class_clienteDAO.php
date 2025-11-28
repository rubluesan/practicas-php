<?php
include 'class_db.php';
class clienteDAO
{

    public function inserir($cliente)
    {

        $query = "insert into cliente (dni, nombre, apellidos, fechaN) values ('" . $cliente->getDni() . "',
			'" . $cliente->getNombre() . "', '" . $cliente->getApellidos() . "', '".$cliente->getFechaN()."');";

        $con = new db();
        $resultado = $con->consulta($query);
        $con->close();

        return $resultado;
    }

    public function eliminar($id)
    {

        $query = "delete from cliente where id = '" . $id . "';";

        $con = new db();
        $resultado = $con->consulta($query);
        $con->close();

        return $resultado;
    }

    public function editar($cliente)
    {

        $query = "update cliente set dni= '" . $cliente->getDni() . "', nombre= '" . $cliente->getNombre() . "', apellidos= '" . $cliente->getApellidos() . "' where id = '" . $cliente->getId() . "';";

        $con = new db();
        $resultado = $con->consulta($query);
        $con->close();

        return $resultado;
    }

    public function buscarId($id)
    {

        $query = "select * from cliente where id = '" . $id . "';";

        $con = new db();
        $consulta = $con->consulta($query);
        $con->close();

        $row = $consulta->fetch_object();

        if (isset($row)) {
            $cliente = new cliente($row->dni, $row->nombre, $row->apellidos, $row->fechaN);
            $cliente->setId($row->id);

            return $cliente;
        }

    }

    public function verClientes()
    {
        $query = "SELECT * FROM cliente;";

        $con = new db();
        $consulta = $con->consulta($query);
        $con->close();

        $arrayClientes = array();
        foreach ($consulta as $row) {
            $cliente = new cliente($row["dni"], $row["nombre"], $row["apellidos"], $row["fechaN"]);
            $cliente->setId($row["id"]);
            array_push($arrayClientes, $cliente);
        }

        return $arrayClientes;
    }

}
?>