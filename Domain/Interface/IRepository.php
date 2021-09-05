<?php

interface IRepository 
{
    public function getById($id, $key = "id");
    public function getAll();
    public function insert($entity);
    public function delete($id, $key = "id");
    public function update($entity, $id, $name = "id");
}