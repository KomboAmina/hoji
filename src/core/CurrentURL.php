<?php
namespace Hoji\Core;

class CurrentURL{

    public static function getURL():string{

        return self::getCurrentURL();

    }

    public static function getCurrentURL():string{

        return (empty($_SERVER['HTTPS']) ? 'http' : 'https')."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    }

}

