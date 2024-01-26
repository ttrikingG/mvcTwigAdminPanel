<?php

namespace app\validate;

use Exception;

abstract class Validate
{
    private $errors =[];

    public function required($fields)
    {
        $this->fieldsIsArray($fields);

        if(empty($fields)){
            foreach($_POST as $key => $value){
                $this->isEmpty($key);
            }

            return;
        }

        foreach($fields as $key => $field){
          $this->isEmpty($field);
        }
    }

    public function email($fields)
    {
        $this->fieldsIsArray($fields);
        
        foreach($fields as $key => $field){
            if(!filter_var($_POST[$field], FILTER_VALIDATE_EMAIL)){
                $this->errors[$field][] = 'Esse email não é válido.';
            }
        }

    }

    public function max($fields)
    {
        $this->fieldsIsArray($fields);

        foreach($fields as $key => $length){
            if(strlen($_POST[$key]) > $length){
                $this->errors[$key][] = "Esse campo deve conter no máxio {$length} caracteres.";
            }
        }
    }

    public function unique($fields)
    {
        $this->fieldsIsArray($fields);

        foreach($fields as $key => $model){
            $model = new $model;
            if($model->find($key, $_POST[$key])){
                $this->errors[$key][] = 'Esse valor já está cadastrado.';
            }
        }
    }

    public function hasErrors()
    {
        return !empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    private function isEmpty($field)
    {
        if(empty($_POST[$field])){
            $this->errors[$field][] = 'Esse campo é obrigatório.';
        }
    }

    private function fieldsIsArray($fields)
    {
        if(!is_array($fields)){
            throw new Exception('Validação precisa ser um array no required.');
        }
    }
}