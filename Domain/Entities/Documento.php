<?php

class Documento
{
    private $idCodigo;
    private $idCliente;
    private $razonSocial;
    private $RFC;
    private $subtotal;
    private $iva;
    private $total;

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
     * Get the value of idCliente
     */ 
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Set the value of idCliente
     *
     * @return  self
     */ 
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    /**
     * Get the value of razonSocial
     */ 
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * Set the value of razonSocial
     *
     * @return  self
     */ 
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    /**
     * Get the value of RFC
     */ 
    public function getRFC()
    {
        return $this->RFC;
    }

    /**
     * Set the value of RFC
     *
     * @return  self
     */ 
    public function setRFC($RFC)
    {
        $this->RFC = $RFC;

        return $this;
    }

    /**
     * Get the value of subtotal
     */ 
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Set the value of subtotal
     *
     * @return  self
     */ 
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    /**
     * Get the value of iva
     */ 
    public function getIva()
    {
        return $this->iva;
    }

    /**
     * Set the value of iva
     *
     * @return  self
     */ 
    public function setIva($iva)
    {
        $this->iva = $iva;

        return $this;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }
}
