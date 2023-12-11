<?php

namespace controllers;

use core\Response;
use core\Request;
use validators\BaseValidator;
use models\Model;


class Controller
{
    protected $response;
    protected $request;
    protected $validator;
    protected $model;

    public function __construct(Response $response, Request $request, BaseValidator $validator, Model $model)
    {
        $this->response = $response;
        $this->request = $request;
        $this->validator = $validator;
        $this->model = $model;
    }
}