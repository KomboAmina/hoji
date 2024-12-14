<?php
namespace Hoji\Tests\Setup;

use \PHPUnit\Framework\TestCase;

class SetupControllerTest extends TestCase{

    public function testHasModelProperty(){

        $controller=new \Hoji\Setup\SetupController(new \Hoji\Setup\SetupModel());

        $this->assertObjectHasProperty("model",$controller);

    }

    public function testHasSetupCheckerProperty(){

        $controller=new \Hoji\Setup\SetupController(new \Hoji\Setup\SetupModel());

        $this->assertObjectHasProperty("setupChecker",$controller);

    }
    

}
