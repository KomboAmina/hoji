<?php
namespace Hoji\Core;

class BaseModel{

    /**
     * paginator
     */
    public array $pagination;

     /**
      * now
      */

    public string $now;

    public function __construct(){

        $this->pagination=array("pagecount"=>0,"limit"=>10,"extras"=>"");

        $this->now=date("Y-m-d H:i:s");

    }

    /**
     * ip address
     */

     /**
      * check if null or empty
      */

      /**
       * get first name
       */

}
