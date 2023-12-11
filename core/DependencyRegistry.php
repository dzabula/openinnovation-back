<?php

namespace core;

use models\UserModel;
use models\Model;
use conf\Database;
use controllers\Controller;
use controllers\UserController;
use validators\BaseValidator;
use validators\UserValidator;

//Registering all classes and all mutual dependencies, The class that serves the Dependency Container
class DependencyRegistry
{
    public static function registerServices()
    {
        $container = new Container();

        $container->register("Database", function () 
        {
            return Database::getInstance();
        });

        $container->register("Request", function () 
        {
            return new Request();
        });
        
        $container->register("Router", function () use ($container)
        {
            return new Router(
                $container->resolve("Request"),
                $container->resolve("Response"),
                $container->resolve("BaseValidator"),
                $container->resolve("Model")
            );
        });

        $container->register("BaseValidator", UserValidator::class);

        $container->register("Response", function () 
        {
            return new Response();
        });
  
        $container->register("Model", function () use ($container) 
        {
            return new UserModel();
        });

        $container->register("Controller", function () use ($container) 
        {
            return new Controller(
                $container->resolve("Response"),
                $container->resolve("Request"),
                $container->resolve("BaseValidator"),
                $container->resolve("Model")
            );
        });

        return $container;
    }
}