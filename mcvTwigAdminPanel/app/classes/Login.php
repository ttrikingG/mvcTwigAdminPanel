<?php

namespace app\classes;

use app\models\Model;

class Login
{
    private $model;
    private $user;

    public function login(Model $model)
    {
        $this->model = $model;

        $this->user = $this->model->find('email', request('email'));

        if(!$this->user){
            return $this->isNotLoggedIn();
        }

        if(Password::verify(request('password'), $this->user->password)){
            return $this->loggedIn();
        }

        return $this->isNotLoggedIn();
    }

    private function loggedIn(){

        $_SESSION[$this->model->session] = true;
        $_SESSION[$this->model->data] = $this->user;

        session_regenerate_id();

        return true;
    }

    private function isNotLoggedIn(){

        flash(['login' => 'Usuário ou senha incorretos']);

        return back();
    }
}