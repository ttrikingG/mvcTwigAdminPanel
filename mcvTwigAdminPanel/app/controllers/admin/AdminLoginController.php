<?php

namespace app\controllers\admin;

use app\models\admin\Admin;
use app\validate\admin\Login;
use app\controllers\ContainerController;

class AdminLoginController extends ContainerController
{
    public function store()
    {
        $login = validate(Login::class);
        
        //return toJason($_POST);

        if($login->hasErrors()){

            flash($login->getErrors());
            return redirect('/admin');
        }

        $logged = auth(new Admin);

        if($logged){
            redirect('/panel');
        }

        return redirect('/painel');
    }
}