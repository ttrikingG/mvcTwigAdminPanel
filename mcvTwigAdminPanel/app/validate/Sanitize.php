<?php

namespace app\validate;

class Sanitize
{
    protected $sanitized = [];

    public function sanitized()
    {
        $posts = $_POST;

        foreach($posts as $name => $value){
            $this->sanitized[$name] = strip_tags($_POST[$name]);
        }

        return(object)  $this->sanitized;
    }
}