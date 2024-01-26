<?php

namespace app\controllers\site;

use app\controllers\ContainerController;

class AdminController extends ContainerController
{
  public function index()
  {


    $this->view([
      'title' => 'Admin Login',

    ], 'admin.login');
  }
}