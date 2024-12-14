<?php
namespace Hoji\Core;

class BaseModel{

    public array $pagination;

    public string $now;

    public function __construct(){

        $this->pagination=array("pagecount"=>0,"limit"=>10,"extras"=>"");

        $this->now=date("Y-m-d H:i:s");

    }

}
