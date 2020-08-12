<?php


namespace App\Business\Services;


use App\Business\Services\Interfaces\IApiCacheService;
use Illuminate\Support\Facades\Cache;

class ApiCacheService implements IApiCacheService
{

    public function cacheExists(): bool{
        if(Cache::get("weather_json") !== null && Cache::get("last_api_update") !== null ){
            return true;
        }
        return false;
    }

    public function getWeatherCache(): array{
        $weather_json = Cache::get("weather_json");
        return $weather_json;
    }

    public function getUpdateTime(): \DateTime{
        return Cache::get("last_api_update");
    }

    public function setCache(array $weather, $updateTime ):void{
        Cache::put("weather_json", $weather,1800);
        Cache::put("last_api_update", $updateTime,1800);
    }

}
