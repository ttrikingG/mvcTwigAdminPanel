<?php

namespace app\controllers\admin;

use app\controllers\ContainerController;

class AdminPostsController extends ContainerController
{
    public function index()
    {
        if(!isset($_SESSION['admin_logged'])){
            //redirect ('/'); esse if tem q elaborar em outra classe
        }
    }
}