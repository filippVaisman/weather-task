<?php


namespace App\Business\Services;


class WeatherUtilsService
{

    /**
     * @param float $wind
     * @return int
     * @throws \Exception
     */
    public function getWindScore(float $wind):int{
        if($wind > 0 && $wind < 2.5)
            return 1;
        if($wind >= 2.5 && $wind < 10.7  )
            return 2;
        if($wind >= 10.7)
            return 3;
        throw new \Exception("unable to calculate wind score");
    }

}
