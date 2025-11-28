<!-- la clase cliente tendrá propiedades id, dni, nombre, apellidos y fechaN (fecha de nacimiento). -->
<?php

class cliente
{
    public $id;
    public $dni;
    public $nombre;
    public $apellidos;
    public $fechaN;

    public function __construct($dni, $nombre, $apellidos, $fechaN)
    {
        $this->setId(null);
        $this->setDni($dni);
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        $this->setFechaN($fechaN);
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * Get the value of dni
     */ 
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set the value of dni
     *
     * @return  self
     */ 
    public function setDni($dni): void
    {
        $this->dni = $dni;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * Get the value of apellidos
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */ 
    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    /**
     * Get the value of fechaN
     */ 
    public function getFechaN()
    {
        return $this->fechaN;
    }

    /**
     * Set the value of fechaN
     *
     * @return  self
     */ 
    public function setFechaN($fechaN): void
    {
        $this->fechaN = $fechaN;
    }
}
?>