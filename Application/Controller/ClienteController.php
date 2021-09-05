<?php

require_once __DIR__ . "/../../Infrestructure/Repository/SQLRepository.php";
require_once __DIR__ . "/../Mapping/Mapper.php";
require_once __DIR__ . "/../../Infrestructure/Data/Connection.php";




class ClienteController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new SQLRepository("Cliente", "clientes");
    }

    public function insert()
    {
        try {
            $cliente = Mapper::mapArray($_POST, new Cliente());
            $this->repository->insert($cliente);
        } catch (\Throwable $th) {
            echo "error $th";
        }
    }


    public function http_request()
    {
        switch ($_SERVER["REQUEST_METHOD"]) {
            case "GET":
                if (isset($_GET["id"]))
                    echo json_encode($this->repository->getById($_GET["id"], "idCliente"));
                else
                    echo json_encode($this->repository->getAll());
                break;

            case "POST":

                var_dump($_POST);
                if (isset($_POST['deleteId'])) {
                    echo "delete";
                    $this->repository->delete($_POST['deleteId'], "idCliente");
                    return;
                }

                if (isset($_POST["updateId"])) {
                    $cliente = Mapper::mapArray($_POST, new Cliente());
                    $cliente->setIdCliente($_POST["updateId"]);
                    try {
                        $this->repository->update($cliente, $_POST["updateId"], "idCliente");
                    } catch (\Throwable $th) {
                        var_dump($th);
                    }

                    return;
                }

                echo json_encode($this->insert());

                break;
        }
    }
}


(new ClienteController())->http_request();
