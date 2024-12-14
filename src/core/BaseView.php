<?php
namespace Hoji\Core;

class BaseView{

    public object $controller;

    public string $route;

    public function __construct(object $controller, string $route=""){

        $this->controller=$controller;

        $this->route=$route;

    }

    public function load(){

        /**
         * header
         * body
         * footer
         */

        echo "load stuff here.";

    }

}
