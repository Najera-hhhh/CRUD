<?php

require_once __DIR__ . "/../../Infrestructure/Repository/SQLRepository.php";
require_once __DIR__ . "/../Mapping/Mapper.php";

class ProductosController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new SQLRepository("Productos");
    }

    public function insert()
    {
        try {
            $producto = Mapper::mapArray($_POST, new Productos());
            $this->repository->insert($producto);
        } catch (\Throwable $th) {
            echo "error $th";
        }
    }


    public function http_request()
    {
        switch ($_SERVER["REQUEST_METHOD"]) {
            case "GET":
                if (isset($_GET["id"]))
                    echo json_encode($this->repository->getById($_GET["id"], "idMaterial"));
                else
                    echo json_encode($this->repository->getAll());
                break;

            case "POST":
                var_dump($_POST);
                if (isset($_POST['deleteId'])) {
                    echo "delete";
                    $this->repository->delete($_POST['deleteId'], "idMaterial");
                    return;
                }

                if (isset($_POST["updateId"])) {
                    $producto = Mapper::mapArray($_POST, new Productos());
                    $producto->setIdMaterial($_POST["updateId"]);
                    try {
                        $this->repository->update($producto, $_POST["updateId"], "idMaterial");
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


(new ProductosController())->http_request();
