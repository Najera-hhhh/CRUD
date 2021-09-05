<?php
try {
require_once __DIR__ . "/../../Infrestructure/Repository/SQLRepository.php";
require_once __DIR__ . "/../../Infrestructure/Repository/DocumentoRepository.php";
require_once __DIR__ . "/../Mapping/Mapper.php";

class VentaController
{
    private $repo_client;
    private $repository_documeto;
    private $repository_documeto2;
    private $repository_product;

    public function __construct()
    {
        $this->repository_product = new SQLRepository("Productos");
        $this->repo_client = new SQLRepository("Cliente", "clientes");
        $this->repository_documeto = new DocumentoRepository("Documento");
        $this->repository_documeto2 = new SQLRepository("DocumentoRenglon");
    }

    public function insert()
    {
        try {

            $cliente = $this->repo_client->getById($_POST["idCliente"], "idCliente");

            foreach ($_POST["idMaterial"] as $key => $value) {
                $documento = new Documento();
                $documento->setIdCliente($cliente->getIdCliente());
                $documento->setRazonSocial($cliente->getRazonSocial());
                $documento->setRFC($cliente->getRFC());


                $producto = $this->repository_product->getById($value, "idMaterial");

                $documento->setSubtotal($producto->getPrecio1() * $_POST["cantidad"][$key]);
                $documento->setIva($_POST["iva"]);
                $documento->setTotal($documento->getSubtotal() + ($documento->getSubtotal() * ($_POST["iva"] / 100)));

                $documentoRenglon = new DocumentoRenglon();
                $documentoRenglon->setIdMaterial($value);
                $documentoRenglon->setUnidadMedida($producto->getUnidadMedida());
                $documentoRenglon->setCantidad($_POST["cantidad"][$key]);
                $documentoRenglon->setPrecio1($producto->getPrecio1());


                $this->repository_documeto->insert($documento);
                $this->repository_documeto2->insert($documentoRenglon);
            }
        } catch (\Throwable $th) {
            echo "error $th";
        }
    }


    public function http_request()
    {
        try {
            switch ($_SERVER["REQUEST_METHOD"]) {
                case "GET":
                    echo json_encode($this->repository_documeto->getVentas($_GET["id"]));
                    break;
                case "POST":
                    $this->insert();
                    break;
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
}


    (new VentaController())->http_request();
} catch (\Throwable $th) {
    var_dump($th);
}
