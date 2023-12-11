<?php

namespace core;

use conf\Database;
use controllers\Controller;

// When starting the application this class is started first
// Centralization of the code, Once I define something here it is valid until the end of the application life cycle
class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public static Application $app;
    public Database $database;

    public function __construct(Container $container)
    {
        self::$app = $this;
        $this->request = $container->resolve('Request');
        $this->response = $container->resolve('Response');
        $this->router = $container->resolve('Router');
        $this->controller = $container->resolve('Controller');
        $this->database = $container->resolve('Database');
    }

    public function run(): void
    {
        $this->router->resolve();
    }
}
