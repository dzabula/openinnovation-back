<?php

namespace controllers;

use validators\BaseValidator;
use models\Model;
use core\Response;
use core\Request;


class UserController extends Controller{
    
    public function __construct(Response $response, Request $request, BaseValidator $validator, Model $model){
        parent::__construct($response,$request,$validator,$model);
    }

    public function get(){
        try{
            $result = $this->model->get();
            $this->response->echoJson($result,200);
        }catch(\Exception $e){
            $this->echoJson(['error'=> $e->getMessage()],500);
        }
    }

    public function post(){
        try{
            $body = $this->request->getBody();
            $errors = $this->validator->validate($body);
            if(is_array($errors)){
                $this->response->json($errors,422);
            }
            $this->model->create($body);
            $this->response->echoJson([],201);
        }catch(\Exception $e){
            $this->echoJson(['error'=> $e->getMessage()],500);
        }
    }

    public function patch(){
        throw new Exception("The method is not implemented yet!");
    }

    public function delete(){
        throw new Exception("The method is not implemented yet!");
    }
}