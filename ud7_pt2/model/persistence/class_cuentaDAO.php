<?php
include 'class_db.php';
class cuentaDAO
{

	public function inserir($cuenta)
	{

		$query = "insert into cuenta (codigo, saldo, cliente) values ('" . $cuenta->getCodigo() . "',
			'" . $cuenta->getSaldo() . "', '" . $cuenta->getCliente() . "');";

		$con = new db();
		$resultado = $con->consulta($query);
		$con->close();

		return $resultado;
	}

	public function eliminar($id)
	{

		$query = "delete from cuenta where id = '" . $id . "';";

		$con = new db();
		$resultado = $con->consulta($query);
		$con->close();

		return $resultado;
	}

	public function editar($cuenta)
	{

		$query = "update cuenta set codigo= '" . $cuenta->getCodigo() . "', saldo= '" . $cuenta->getSaldo() . "', cliente= '" . $cuenta->getCliente() . "' where id = '" . $cuenta->getId() . "';";

		$con = new db();
		$resultado = $con->consulta($query);
		$con->close();

		return $resultado;
	}

	public function buscarId($id)
	{

		$query = "select * from cuenta where id = '" . $id . "';";

		$con = new db();
		$consulta = $con->consulta($query);
		$con->close();

		$row = $consulta->fetch_object();

		if (isset($row)) {
			$cuenta = new cuenta($row->codigo, $row->saldo, $row->cliente);
			$cuenta->setId($row->id);

			return $cuenta;
		}
	}

	public function verCuentas()
	{
		$query = "SELECT * FROM cuenta;";

		$con = new db();
		$consulta = $con->consulta($query);
		$con->close();

		$arrayCuentas = array();
		foreach ($consulta as $row) {
			$cuenta = new cuenta($row["codigo"], $row["saldo"], $row["cliente"]);
			$cuenta->setId($row["id"]);
			array_push($arrayCuentas, $cuenta);
		}

		return $arrayCuentas;
	}

	public function verCliente($cuenta)
	{
		$query = "select nombre, apellidos FROM cliente where id = '".$cuenta->getCliente()."';";

		$con = new db();
		$consulta = $con->consulta($query);
		$con->close();

		$nombreApellidos = "";
		$row = $consulta->fetch_object();

		if (isset($row)) {
			$nombreApellidos = $row->nombre." ".$row->apellidos;

			return $nombreApellidos;
		}
	}
}
