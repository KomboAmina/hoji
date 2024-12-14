<?php
namespace Hoji\Tests\Core;

use \PHPUnit\Framework\TestCase;

class HojiTest extends TestCase{

    public function testHasRouteProperty(){

        $hoji=new \Hoji\Core\Hoji();

        $this->assertObjectHasProperty("route",$hoji);

    }

    public function testRouteIsString(){

        $hoji=new \Hoji\Core\Hoji();

        $this->assertIsString($hoji->route);

    }

    public function testRouteIsNotEmpty(){

        $hoji=new \Hoji\Core\Hoji();

        $this->assertNotEmpty($hoji->route);

    }

    public function testHasModelProperty(){

        $hoji=new \Hoji\Core\Hoji();

        $this->assertObjectHasProperty("model",$hoji);

    }

    public function testModelPropertyIsObject(){

        $hoji=new \Hoji\Core\Hoji();

        $this->assertIsObject($hoji->model);

    }

    public function testHasControllerProperty(){

        $hoji=new \Hoji\Core\Hoji();

        $this->assertObjectHasProperty("controller",$hoji);

    }

    public function testHasViewProperty(){

        $hoji=new \Hoji\Core\Hoji();

        $this->assertObjectHasProperty("view",$hoji);

    }


}
