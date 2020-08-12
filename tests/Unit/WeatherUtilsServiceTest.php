<?php


namespace Tests\Unit;


use App\Business\Services\WeatherUtilsService;
use Tests\TestCase;

class WeatherUtilsServiceTest extends TestCase
{

    public function testGetWindScore(){

        $wu = new WeatherUtilsService();
        $r1 = 1.1;
        $r2 = 2.5;
        $r3 = 9999;
        $r0 = -1;

        $res1 = $wu->getWindScore($r1);
        $res2 = $wu->getWindScore($r2);
        $res3 = $wu->getWindScore($r3);

        $this->assertEquals(1, $res1);
        $this->assertEquals(2, $res2);
        $this->assertEquals(3, $res3);

        $this->expectException(\Exception::class);
        $res4 = $wu->getWindScore($r0);

    }

}
