<?php

include '../persistence/class_cuentaDAO.php';

class cuenta
{
	public $id;
	public $codigo;
	public $saldo;
	public $cliente;

	public $nombreApellidos;

	public function __construct($codigo, $saldo, $cliente)
	{
		$this->setId(null);
		$this->setCodigo($codigo);
		$this->setSaldo($saldo);
		$this->setCliente($cliente);
		$this->setNombreApellidosCliente(null);
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($value)
	{
		$this->id = $value;
	}

	public function getCodigo()
	{
		return $this->codigo;
	}

	public function setCodigo($value)
	{
		$this->codigo = $value;
	}

	public function getSaldo()
	{
		return $this->saldo;
	}

	public function setSaldo($value)
	{
		$this->saldo = $value;
	}

	public function getCliente()
	{
		return $this->cliente;
	}

	public function setCliente($value)
	{
		$this->cliente = $value;
	}

	public function getNombreApellidosCliente()
	{
		$dao = new cuentaDAO();
		return $dao->verCliente($this);
	}

	public function setNombreApellidosCliente($nombreApellidos)
	{
		$this->nombreApellidos = $nombreApellidos;
	}

}
?>