<?php
require __DIR__ . "/../../Domain/Interface/IRepository.php";
require __DIR__ . "/../Data/Connection.php";
require __DIR__ . "/../../Application/Mapping/Mapper.php";

$files = glob(__DIR__ . "/../../Domain/Entities" . '/*.php');

foreach ($files as $file) {
    require($file);
}

function str_replace_limit($search, $replace, $string, $limit = 1)
{
    $pos = strpos($string, $search);

    if ($pos === false) {
        return $string;
    }

    $searchLen = strlen($search);

    for ($i = 0; $i < $limit; $i++) {
        $string = substr_replace($string, $replace, $pos, $searchLen);

        $pos = strpos($string, $search);

        if ($pos === false) {
            break;
        }
    }

    return $string;
}


class SQLRepository  implements IRepository
{
    protected $connection;
    protected $_context;
    protected $entity;
    protected $table;

    public function __construct($entity, $table = null)
    {
        $this->entity = $entity;
        $this->table = $table == null ? strtolower($this->entity) : $table;
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
            $key = trim(str_replace_limit(get_class($entity), "", $key, 1)); //trim(str_replace(get_class($entity), "", $key));
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
        var_dump($query);

        $stm = $this->_context->prepare($query);

        return $stm->execute($arrValue);
    }

    public function delete($id, $key = "id")
    {
        $sql = "DELETE FROM $this->table WHERE $key = ?";

        $stm = $this->_context->prepare($sql);
        $stm->execute(array($id));
    }

    public function update($entity, $id, $name = "id")
    {
        try {
            $arrValue = array();
            $arrkey = (array)$entity;
            $query = "UPDATE " . $this->table . " SET ";
        } catch (\Throwable $th) {
            echo "Se esperaba un objeto " . $th;
        }
        $setValue = "";
        foreach ($arrkey as $key => $value) {

            //añadir key a la consulta
            $key = trim(str_replace_limit(get_class($entity), "", $key, 1));
            $setValue .= "$key = ";

            //añadir el valor de la key
            $key_method = ucfirst($key);
            $insertValue = $entity->{"get" . $key}();
            array_push($arrValue, $insertValue);

            if (gettype($insertValue) == "string" and $insertValue != NULL)
                $setValue .= " ?, ";
            else if ($insertValue == NULL)
                $setValue .= " ?, ";
            else
                $setValue .= $insertValue . ", ";
        }

        $query .= substr($setValue, 0, -2) . " WHERE $name = ?";
        array_push($arrValue, $id);

        var_dump($query);
        $stm = $this->_context->prepare($query);
        return $stm->execute($arrValue);
    }


}
