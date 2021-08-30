<?php
require __DIR__ . "/../../Domain/Interface/IRepository.php";
require __DIR__ . "/../Data/Connection.php";
require __DIR__ . "/../../Application/Mapping/Mapper.php";

$files = glob("/srv/http/CRUD/Domain/Entities" . '/*.php');

foreach ($files as $file) {
    require($file);
}


class SQLRepository  implements IRepository
{
    private $connection;
    private $_context;
    private $entity;
    private $table;

    public function __construct($entity)
    {
        $this->entity = $entity;
        $this->table = strtolower($this->entity);
        $this->connection = new Connection();
        $this->_context = $this->connection->connection;
    }

    public function getById($id, $key = "id")
    {
        $sql = "SELECT * FROM $this->table WHERE $key = ?";

        $stm = $this->_context->prepare($sql);
        $stm->execute(array($id));

        $r = $stm->fetch(PDO::FETCH_ASSOC);
        var_dump($sql);

        $entity = Mapper::mapArray($r, new $this->entity());

        return $entity;
    }

    public function getAll()
    {
        try {
            $result = array();
            $sql = "SELECT * FROM $this->table";
            $stm = $this->_context->prepare($sql);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $array) {
                $result[] = $array;
            }
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insert($entity)
    {
        try {
            $arrkey = (array)$entity;
            $arrValue = array();

            $query = "INSERT INTO " . $this->table . " ";
            $nameKeys = "(";
            $values = "(";
        } catch (\Throwable $th) {
            echo "Se esperaba un objeto " . $th;
        }

        foreach ($arrkey as $key => $value) {
            //añadir key a la consulta
            $key = trim(str_replace(get_class($entity), "", $key));
            $nameKeys .= $key . ",";

            //añadir el valor de la key
            $values .=  "?" . ",";
            array_push($arrValue, $value);
        }

        //eliminar la ultima coma de mas y agregar el cierre de parentesis
        $nameKeys = substr($nameKeys, 0, -1) . ") VALUES ";
        $values = substr($values, 0, -1) . ")";
        $query = $query . $nameKeys . $values;

        var_dump($arrValue);

        $stm = $this->_context->prepare($query);
        
        return $stm->execute($arrValue);
    }

    public function delete($id, $key = "id")
    {
        $sql = "DELETE FROM $this->table WHERE $key = ?";

        $stm = $this->_context->prepare($sql);
        $stm->execute(array($id));
    }
}
