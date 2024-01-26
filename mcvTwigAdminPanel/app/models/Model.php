<?php

namespace app\models;

use app\models\Connection;

abstract class Model
{
    protected $connection;
    protected $table;

    public function __construct()
    {
        $this->connection = Connection::connect();
    }

    public function all()
    {
        $sql =  "select * from {$this->table}";
        $list = $this->connection->query($sql);
        $list->execute();

        return $list->fetchAll();
    }

    public function find($field, $value)
    {
        $sql = "select * from {$this->table} where {$field} = ?";
        $list = $this->connection->prepare($sql);
        $list->bindValue(1, $value);
        $list->execute();
        
        return $list->fetch();
    }

    public function delete($field, $value)
    {
        $sql = "delete from {$this->table} where {$field} = ?";
        $delete  = $this->connection->prepare($sql);
        $delete->bindValue(1, $value);
        $delete->execute();
        
        return $delete->rowConunt();
    }
}