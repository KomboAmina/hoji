<?php
namespace Hoji\Core;

class BaseController{

    public object $model;

    public function __construct(object $model){

        $this->model=$model;

    }

    public function relocate(string $url):void{

        header("Location: ".$url);

    }

}
