<?php


namespace App\Business\Services\Mock;


use App\Business\Services\Interfaces\IApiCacheService;

class MockCacheService implements IApiCacheService
{

    public function cacheExists(): bool
    {
        return false;
    }

    public function getWeatherCache(): array
    {
        throw new \Exception("not implemented");
    }

    public function getUpdateTime(): \DateTime
    {
        throw new \Exception("not implemented");
    }

    public function setCache(array $weather, $updateTime): void
    {
        // do nothing
    }
}
