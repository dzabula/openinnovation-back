<?php

namespace conf;

use PDO;
use PDOException;
use conf\DatabaseConfig;


class Database
{
    private static $instance; // The instance must be static so that it is only created once and only accessed every other time
    private $connection;

    // The constructor is private as no other class can create the object
    private function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    //Return an instance of the class if it has already been created, if not we create it and return it
    public static function getInstance()
    {
        if (self::$instance === null) {
            try {
                $config = DatabaseConfig::getConfigInstance();
                $connection = new PDO(
                    'mysql:host=' . $config->getHost() . ';dbname=' . $config->getDatabase(),
                    $config->getUsername(),
                    $config->getPassword()
                );
                self::$instance = new self($connection);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function executeQuery($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);

            if (!empty($params)) {
                foreach ($params as $param => $value) {
                    $statement->bindValue($param, $value);
                }
            }
            $statement->execute();
            return $statement;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

}