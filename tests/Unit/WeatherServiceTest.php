<?php


namespace Tests\Unit;


use App\Business\Services\Mock\MockApiHttpService;
use App\Business\Services\Mock\MockCacheService;
use App\Business\Services\Mock\MockWeatherUtilsService;
use App\Business\Services\SimpleWeatherService;
use Tests\TestCase;

class WeatherServiceTest extends TestCase
{

    public function testGetWeatherData(){
        $weatherService = new SimpleWeatherService(new MockApiHttpService(), new MockWeatherUtilsService(), new MockCacheService());

        $response = $weatherService->getWeatherData();

        $this->assertNotNull($response);
        $this->assertIsArray($response);
        $this->assertNotNull($response["current"]);
        $this->assertEquals(1, $response["current"]["wind_score"]);

    }

}
