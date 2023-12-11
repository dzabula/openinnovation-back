<?php

class Autoloader
{
    public static function register()
    {
        $basePath = __DIR__;

        spl_autoload_register(function ($className) use ($basePath) {

            $filePath = $basePath . '/' . str_replace('\\', '/', $className) . '.php';

            if (file_exists($filePath)) {
                require_once $filePath;
            }
        });
    }
}