<?php
namespace config;

trait PDO{

    public function pdo()
    {
        $database = new database();
        return $database->connectThroughPDO();
    }
}