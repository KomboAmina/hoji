<?php
namespace Hoji\Tests\Core;

use \PHPUnit\Framework\TestCase;

class CurrentURLTest extends TestCase{

    public function testGetCurrentURLReturnsString(){

        $url=\Hoji\Core\CurrentURL::getCurrentURL();

        $this->assertIsString($url);

    }

    public function testGetCurrentURLReturnsNotEmptyString(){

        $url=\Hoji\Core\CurrentURL::getCurrentURL();

        $this->assertNotEmpty($url);

    }

}
