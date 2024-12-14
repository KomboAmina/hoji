<?php
namespace Hoji\Setup;

class SetupController extends \Hoji\Core\HojiController{

    public object $setupChecker;

    public function __construct($model){

        parent::__construct($model);

        $this->setupChecker=new \Hoji\Core\SetupChecker();

    }

}
