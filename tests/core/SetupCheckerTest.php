<?php
namespace Hoji\Tests\Core;

use \PHPUnit\Framework\TestCase;

class SetupCheckerTest extends TestCase{

    public function testHasTriggerSetupProperty(){

        $checker=new \Hoji\Core\SetupChecker();

        $this->assertObjectHasProperty("triggerSetup",$checker);

    }

    public function testTriggerSetupIsBoolean(){

        $checker=new \Hoji\Core\SetupChecker();

        $this->assertIsBool($checker->triggerSetup);

    }

    public function testHasSetupStepProperty(){

        $checker=new \Hoji\Core\SetupChecker();

        $this->assertObjectHasProperty("setupStep",$checker);

    }

    public function testSetupStepPropertyIsInt(){

        $checker=new \Hoji\Core\SetupChecker();

        $this->assertIsInt($checker->setupStep);

    }


}

