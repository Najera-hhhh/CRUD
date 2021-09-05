<?php
require __DIR__ . "/../../Domain/Interface/IDocumento.php";

class DocumentoRepository extends SQLRepository implements IDocumento
{
    function __construct()
    {
        parent::__construct("Documento");
    }

    public function getVentas($id)
    {
        try {
            $result = array();
            $sql = "SELECT
            c.idCliente,
            c.RFC,
            c.razonSocial,
            d.subtotal,
            d.iva,
            d.total
          FROM
            clientes as c
            INNER JOIN documento as d ON c.idCliente = d.idCliente AND
            c.idCliente = $id;";


            $stm = $this->_context->prepare($sql);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $array) {
                $result[] = $array;
            }
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
