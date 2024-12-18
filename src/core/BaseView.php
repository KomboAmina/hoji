<?php
namespace Hoji\Core;

class BaseView{

    public object $controller;

    public string $route;

    public function __construct(object $controller, string $route=""){

        $this->controller=$controller;

        $this->route=$route;

        $this->manageRouting();

    }

    private function manageRouting():void{

        if(defined('URL')){

            if(isset($_GET['route']) && $_GET['route']!==$this->route){

                $this->controller->relocate("../".$this->route."/");

            }

        }

    }

    private function formatReferenceURL(string $url):string{

        $protocol=$this->controller->model->getURLProtocol();

        if(!defined('URL')){

            $elements=explode($protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],$url);

            //print_r($elements);

            $url=$protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        }

        else{

            $url=URL;

        }

        return $url;

    }

    public function load():void{

        /**
         * header
         * body
         * footer
         */


        $upperURL=$this->formatReferenceURL(\Hoji\Core\CurrentURL::getCurrentURL());

        $refURL=(defined('URL')) ? URL:$upperURL;

        $refTitle=(defined('TITLE')) ? TITLE:"Hoji";

        include_once "src".DS."common".DS."partial".DS."header.php";

        $baseFile="src".DS.$this->route.DS."base.php";

        if(file_exists($baseFile)){

            echo $baseFile."<br />";

            include_once $baseFile;

        }

        else{

            $this->show404();

        }

        include_once "src".DS."common".DS."partial".DS."footer.php";

    }

    private function show404():void{

        include "src".DS."common".DS."errors".DS."404.php";

    }

}
