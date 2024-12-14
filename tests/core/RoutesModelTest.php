<?php
namespace Hoji\Tests\Core;

use \PHPUnit\Framework\TestCase;

class RoutesModelTest extends TestCase{

    public function testHasValidRoutesProperty(){

        $routesModel=new \Hoji\Core\RoutesModel(false);

        $this->assertObjectHasProperty("validRoutes",$routesModel);

    }

    public function testValidRoutesIsArray(){

        $routesModel=new \Hoji\Core\RoutesModel(false);

        $this->assertIsArray($routesModel->validRoutes);

    }

    public function testValidRoutesArrayIsNotEmpty(){

        $routesModel=new \Hoji\Core\RoutesModel(false);

        $this->assertNotEmpty($routesModel->validRoutes);

    }

    public function testHasTriggerSetupProperty(){

        $routesModel=new \Hoji\Core\RoutesModel(false);

        $this->assertObjectHasProperty("triggerSetup",$routesModel);

    }

    public function testTriggerSetupPropertyIsNotEmpty(){

        $routesModel=new \Hoji\Core\RoutesModel();

        $this->assertNotEmpty($routesModel->triggerSetup);

    }

    public function testGetValidRoutesReturnsArray(){

        $routesModel=new \Hoji\Core\RoutesModel(false);

        $this->assertIsArray($routesModel->getValidRoutes(false));

    }

    public function testIsValidRouteReturnsBoolean(){

        $routesModel=new \Hoji\Core\RoutesModel(false);

        $this->assertIsBool($routesModel->isValidRoute("yes"));

    }

}

