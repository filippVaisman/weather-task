<?php


namespace Tests\Unit;


use App\Business\Services\ApiCacheService;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class CacheServiceTest extends TestCase
{

    public function testExists(){
        Artisan::call('cache:clear');
        Cache::put("weather_json", []);
        Cache::put("last_api_update", new \DateTime());
        $cacheService =new ApiCacheService();
        $this->assertTrue($cacheService->cacheExists());

    }

    public function testGetWeather(){
        Artisan::call('cache:clear');
        Cache::put("weather_json", ["test" =>"test"]);
        $cacheService =new ApiCacheService();

        $response = $cacheService->getWeatherCache();

        $this->assertNotNull($response);
        $this->assertIsArray($response);
        $this->assertEquals("test", $response["test"]);

    }

    public function testGetUpdateTime(){
        Artisan::call('cache:clear');
        Cache::put("last_api_update", new \DateTime());
        $cacheService = new ApiCacheService();

        $response = $cacheService->getUpdateTime();

        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertTrue($response instanceof \DateTime);

    }

    public function testSetCache(){
        Artisan::call('cache:clear');
        Cache::put("last_api_update", new \DateTime());
        $cacheService = new ApiCacheService();

        $cacheService->setCache([], new \DateTime());
        $this->assertNotNull(Cache::get("weather_json"));
        $this->assertNotNull(Cache::get("last_api_update"));
    }

}
