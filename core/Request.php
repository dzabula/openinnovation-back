<?php

namespace core;

// A class that provides us with all the information about an incoming http request
class Request
{
    public function getBody(){
        $body = [];

        if ($this->getMethod() === "get") $body = $_GET;

        if ($this->getMethod() === "post")$body = $_POST;

        if ($this->getContentType() === 'application/json'){
            $input = file_get_contents('php://input');
            $body = json_decode($input, true);
        }

        return $body;
    }

    public function getContentType(){
        $contentType = $_SERVER['CONTENT_TYPE'] ?? '';

        if (empty($contentType) && isset($_SERVER['HTTP_ACCEPT'])){
            $acceptHeader = $_SERVER['HTTP_ACCEPT'];
            $acceptParts = explode(';', $acceptHeader);
            $contentType = trim($acceptParts[0]);
        }

        return $contentType;
    }

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position=strrpos($path,'/');
        
        if(!$position)
        {
           return $path;
        }
        return substr($path, $position);
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

   

}