<?php

namespace app\classes;

class Flash
{
    public static function add($messages)
    {
        foreach($messages as $key => $message){
            if(!isset($_SESSION['flash'][$key])){
                $_SESSION['flash'][$key] = $message;
            }
        }
    }

    public static function get($index, $type)
    {
        if(isset($_SESSION['flash'][$index])){
            $messages = $_SESSION['flash'][$index];

            unset($_SESSION['flash'][$index]);

            return isset($message) ? static::getMessage($messages, $type) : '';
        }

        return '';
    }

    private static function getMessage($messages, $type = 'danger')
    {
        if(!is_array($messages)){
            return static::singleMessage($messages, $type);
        }

        return static::multipleMessage($messages, $type);
    }

    private static function singleMessage($message, $type)
    {
        return '<span class="text- '. $type . '">'.$message.'</span>';
    }

    private static function multipleMessage($messages, $type)
    {
        $list = '<ul>';
            foreach($messages as $message){
                $list.= '<li class="text- '. $type . '">'.$message.'</li>';
            }
        $list.= '</ul>';

        echo $list;
    }
}

