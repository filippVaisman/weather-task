<?php


namespace App\Business\Services;


use App\Business\Services\Interfaces\IApiCacheService;
use App\Business\Services\Interfaces\IApiHttpService;
use App\Business\Services\Interfaces\IWeatherService;
use DateTime;

class SimpleWeatherService implements IWeatherService
{

    private IApiHttpService $httpService;
    private WeatherUtilsService $weatherUtilsService;
    private IApiCacheService $apiCacheService;
    private string $apiUrl = "https://api.openweathermap.org/data/2.5/onecall";
    private float $WALat = 52.237049;
    private float $WALon = 21.017532;
    private string $lang = "pl";
    private string $units = "metric";

    public function __construct(IApiHttpService $httpService, WeatherUtilsService $weatherUtilsService, IApiCacheService $apiCacheService)
    {
        $this->httpService = $httpService;
        $this->weatherUtilsService = $weatherUtilsService;
        $this->apiCacheService = $apiCacheService;
    }

    public function getWeatherData(): array
    {

        if($this->apiCacheService->cacheExists()){
            $weather_json = $this->apiCacheService->getWeatherCache();
            $weather_json = $this->setApiUpdateTime($weather_json,$this->apiCacheService->getUpdateTime());
            return $weather_json;
        }

        $apiUpdateTime = new DateTime("Europe/Warsaw");
        $response = $this->httpService->get($this->apiUrl, [
            "lat"=>$this->WALat,
            "lon"=>$this->WALon,
            "APPID" => env("OPENWEATHER_KEY",""),
            "lang"=> $this->lang,
            "units"=>$this->units
        ]);

        $response = $response->json();
        $response = $this->setApiUpdateTime($response, $apiUpdateTime);
        $response = $this->processWeatherData($response);

        $this->apiCacheService->setCache($response, $apiUpdateTime);
        return $response;
    }

    private function processWeatherData(array $response){
        $windSpeed = $response["current"]["wind_speed"];
        $response["current"]["wind_score"] = $this->weatherUtilsService->getWindScore(floatval($windSpeed));
        return $response;
    }


    private function setApiUpdateTime(array $array, DateTime $time):array{
        $arr_copy = $array;
        $arr_copy["last_api_update"] = $time->format("Y-m-d H:i:s");
        return $arr_copy;
    }

}
