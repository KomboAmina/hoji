<?php
namespace Hoji\Core;

class BaseModel{

    public array $pagination;

    public string $now;

    public function __construct(){

        $this->pagination=array("pagecount"=>0,"limit"=>10,"extras"=>"");

        $this->now=date("Y-m-d H:i:s");

    }

    public function formatMethodName(string $rawName):string{

        $formattedName=ucwords($rawName);

        if(!empty($formattedName)){

            $formattedName=lcfirst($formattedName);

            $formattedName=str_replace(" ","",$formattedName);

            $formattedName=str_replace("-","",$formattedName);

        }

        return $formattedName;

    }

    public function getURLProtocol():string{

        /**
         * credit: Rid Iculous on Stackoverflow:
         * https://stackoverflow.com/questions/4503135/php-get-site-url-protocol-http-vs-https
         * 
         */

         if (isset($_SERVER['HTTPS']) &&
            ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
            isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
            $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {

            $protocol = 'https://';

        }
        else {

            $protocol = 'http://';
        }

        return $protocol;

    }

}
