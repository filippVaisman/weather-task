<?php


namespace App\Http\Controllers;


use App\Business\Services\Interfaces\IWeatherService;

class HomeController
{

    public function show(IWeatherService $weatherService)
    {
//        return $weatherService->getWeatherData();
        return view('home', ['weather' => $weatherService->getWeatherData()]);
    }

}
