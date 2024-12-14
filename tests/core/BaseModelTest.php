<?php
namespace Hoji\Tests\Core;

use \PHPUnit\Framework\TestCase;

class BaseModelTest extends TestCase{

    public function testHasPaginationProperty(){

        $baseModel=new \Hoji\Core\BaseModel();

        $this->assertObjectHasProperty("pagination",$baseModel);

    }

    public function testPaginationIsArray(){

        $baseModel=new \Hoji\Core\BaseModel();

        $this->assertIsArray($baseModel->pagination);

    }

    public function testHasNowProperty(){

        $baseModel=new \Hoji\Core\BaseModel();

        $this->assertObjectHasProperty("now",$baseModel);

    }

    public function testNowPropertyIsDate(){

        $baseModel=new \Hoji\Core\BaseModel();

        $this->assertEquals(date("Y-m-d H:i:s"),$baseModel->now);

    }

}
