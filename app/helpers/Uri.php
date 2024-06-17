<?php



namespace app\helpers;


class Uri{

    public static function getUri(){
        return $_SERVER["REQUEST_URI"];
    }
}