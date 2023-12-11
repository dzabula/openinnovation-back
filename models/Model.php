<?php

namespace models;

use core\Application;
use conf\Database;

class Model
{
    protected string $table = "";
    protected $dbModel;
    
    public function __construct(){
        $this->dbModel = Database::getInstance();
    }

    //Automation of the query, so that the derived classes would not have to write the sql query
    public function create(array $data){
        $columns = "";
        $prepareValue = "";
        $values = [];
        $columns = implode(", ",array_keys($data));
        $columns .= " , createdAt";
        
        $prepareValue = array_map(function ($key) {
            return ":" . $key;
        }, array_keys($data));
        
        $prepareValueString = implode(", ",$prepareValue);
        $prepareValueString .= " , :createdAt";
      
        foreach ($data as $col => $value){
             $values[":$col"] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            //  $values[":$col"] = $value;
        }

        $values[":createdAt"] = date('Y-m-d H:i:s');

        $query = "INSERT INTO $this->table ($columns) VALUES ($prepareValueString)";
        
        return $this->dbModel->executeQuery($query, $values);        
    }

    //Automation of the query, so that the derived classes would not have to write the sql query
    public function get($data = []){
        $columns = "";
        if(count($data) === 0) $columns = "*";
        else $columns = implode(", ",array_keys($data));
        
        $query = "SELECT $columns FROM $this->table";
        return $this->dbModel->executeQuery($query)->fetchAll();
    }

    public function update(array $data){
        throw new Exception("The method is not implemented yet!");
    }

    public function delete(array $data){
        throw new Exception("The method is not implemented yet!");
    }
}