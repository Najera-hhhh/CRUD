<?php
class Cliente
{
    private $idCliente;
    private $razonSocial;
    private $RFC;

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


    
}
