<?php

use app\classes\Flash;
use app\models\Model;
use app\classes\Login;
use app\classes\Redirect;
use app\validate\Sanitize;

function dd($dump)
{
  var_dump($dump);
  die();
}

function toJason($data)
{
  header('Content-Type: application/json');
  echo json_encode($data);
}

function validate($validate)
{
  $validate = new $validate();

  $validate->validate();

  return $validate;
}

function request($field)
{
  $sanitized = new Sanitize;
  return $sanitized->sanitized()->$field;
}

function auth(Model $model)
{
  return (new Login)->login($model);
}

function redirect($target)
{
  return Redirect::redirect($target);
}

function back()
{
  return Redirect::back();
}

function flash($messages)
{
  return (new Flash)->add($messages);
}