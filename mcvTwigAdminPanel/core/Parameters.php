<?php

namespace core;

use app\classes\Uri;

class Parameters
{
  private $uri;

  public function __construct()
  {
    $this->uri = Uri::uri();
  }

  public function load()
  {
    return $this->getParameter();
  }

  private function getParameter()
  {
    if (substr_count($this->uri, '/') > 2) {
      $parameter = array_values(array_filter(explode('/', $this->uri)));

      return (object)[
        "parameter" => strip_tags($parameter[2]),
        "next" => strip_tags($this->getNextParamenter(2))
      ];
    }
  }

  private function getNextParamenter($actual)
  {
    $parameter = array_values(array_filter(explode('/', $this->uri)));

    return $parameter[$actual + 1] ?? $parameter[$actual];
  }
}
