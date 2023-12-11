<?php

namespace conf;

class DatabaseConfig
{
    private static $instance = null;

    private $host;
    private $username;
    private $password;
    private $database;

    // The constructor is private as no other class can create the object
    private function __construct()
    {
        $env = parse_ini_file(dirname(__DIR__) . '/conf/.env');

        $this->host = $env['HOST'];
        $this->username = $env['USERNAME'];
        $this->password = $env['PASSWORD'];
        $this->database = $env['NAME'];
    }


    public static function getConfigInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getDatabase()
    {
        return $this->database;
    }
}
