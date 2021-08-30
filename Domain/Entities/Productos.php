<?php

class Productos
{
    private $idMaterial;
    private $descripcion;
    private $unidadMedida;
    private $precio1;

    /**
     * Get the value of idMaterial
     */ 
    public function getIdMaterial()
    {
        return $this->idMaterial;
    }

    /**
     * Set the value of idMaterial
     *
     * @return  self
     */ 
    public function setIdMaterial($idMaterial)
    {
        $this->idMaterial = $idMaterial;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of unidadMedida
     */ 
    public function getUnidadMedida()
    {
        return $this->unidadMedida;
    }

    /**
     * Set the value of unidadMedida
     *
     * @return  self
     */ 
    public function setUnidadMedida($unidadMedida)
    {
        $this->unidadMedida = $unidadMedida;

        return $this;
    }

    /**
     * Get the value of precio1
     */ 
    public function getPrecio1()
    {
        return $this->precio1;
    }

    /**
     * Set the value of precio1
     *
     * @return  self
     */ 
    public function setPrecio1($precio1)
    {
        $this->precio1 = $precio1;

        return $this;
    }
}
