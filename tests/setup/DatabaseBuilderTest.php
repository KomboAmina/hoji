<?php
namespace Hoji\Tests\Setup;

use \PHPUnit\Framework\TestCase;

class DatabaseBuilderTest extends TestCase{

    public function testHasdbValuesProperty():void{

        $builder=new \Hoji\Setup\DatabaseBuilder(array());

        $this->assertObjectHasProperty("dbValues",$builder);

    }

    public function testdbValuesPropertyIsArray():void{

        $builder=new \Hoji\Setup\DatabaseBuilder(array());

        $this->assertIsArray($builder->dbValues);

    }

    public function testdbValuesArrayIsNotEmpty():void{

        $builder=new \Hoji\Setup\DatabaseBuilder(array(1));

        $this->assertNotEmpty($builder->dbValues);

    }

    public function testdbValuesArrayHasDBHostValue():void{

        $builder=new \Hoji\Setup\DatabaseBuilder(array("dbhost"=>""));

        $this->assertArrayHasKey("dbhost",$builder->dbValues);

    }

    public function testdbValuesArrayDBHostValueNotEmpty():void{

        $builder=new \Hoji\Setup\DatabaseBuilder(
            array("dbhost"=>"localhost")
        );

        $this->assertNotEmpty($builder->dbValues['dbhost']);

    }

    public function testdbValuesArrayHasDBNameValue():void{

        $builder=new \Hoji\Setup\DatabaseBuilder(array("dbname"=>""));

        $this->assertArrayHasKey("dbname",$builder->dbValues);

    }

    public function testdbValuesArrayDBNameValueNotEmpty():void{

        $builder=new \Hoji\Setup\DatabaseBuilder(
            array("dbname"=>"hojidb01")
        );

        $this->assertNotEmpty($builder->dbValues['dbname']);

    }

    public function testdbValuesArrayHasDBUserValue():void{

        $builder=new \Hoji\Setup\DatabaseBuilder(array("dbuser"=>""));

        $this->assertArrayHasKey("dbuser",$builder->dbValues);

    }

    public function testdbValuesArrayDBUserValueNotEmpty():void{

        $builder=new \Hoji\Setup\DatabaseBuilder(
            array("dbuser"=>"root")
        );

        $this->assertNotEmpty($builder->dbValues['dbuser']);

    }

    public function testdbValuesArrayHasDBPassValue():void{

        $builder=new \Hoji\Setup\DatabaseBuilder(array("dbpass"=>""));

        $this->assertArrayHasKey("dbpass",$builder->dbValues);

    }

    public function testdbValuesArrayHasDBPortValue():void{

        $builder=new \Hoji\Setup\DatabaseBuilder(array("dbport"=>""));

        $this->assertArrayHasKey("dbport",$builder->dbValues);

    }

    public function testdbValuesArrayDBPortValueNotEmpty():void{

        $builder=new \Hoji\Setup\DatabaseBuilder(
            array("dbport"=>3306)
        );

        $this->assertNotEmpty($builder->dbValues['dbport']);

    }

}
