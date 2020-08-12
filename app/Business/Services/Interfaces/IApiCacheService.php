<?php


namespace App\Business\Services\Interfaces;


interface IApiCacheService
{

    public function cacheExists(): bool;

    public function getWeatherCache(): array;

    public function getUpdateTime(): \DateTime;

    public function setCache(array $weather, $updateTime): void;

}
