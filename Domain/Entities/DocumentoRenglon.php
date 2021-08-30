<?php

class DocumentoRenglon
{
    private $idCodigo;
    private $idMaterial;
    private $unidadMedida;
    private $cantidad;
    private $precio1;

    /**
     * Get the value of idCodigo
     */ 
    public function getIdCodigo()
    {
        return $this->idCodigo;
    }

    /**
     * Set the value of idCodigo
     *
     * @return  self
     */ 
    public function setIdCodigo($idCodigo)
    {
        $this->idCodigo = $idCodigo;

        return $this;
    }

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
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

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
