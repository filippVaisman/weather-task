<?php


namespace App\Business\Services\Mock;


use App\Business\Services\WeatherUtilsService;

class MockWeatherUtilsService extends WeatherUtilsService
{
    public function getWindScore(float $wind):int
    {
        return 1;
    }


}
