<?php

namespace core;

// A class that facilitates returning data to the client
class Response
{
    public function setStatusCode(int $code): void
    {
        http_response_code($code);
    }

    public function echoJson(array $data, int $statusCode = 200) : void
    {
        header('Content-Type: application/json');
        $this->setStatusCode($statusCode);
        echo json_encode($data);
        exit;
    }
}