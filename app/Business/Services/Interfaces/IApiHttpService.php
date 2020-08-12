<?php


namespace App\Business\Services\Interfaces;


use Illuminate\Http\Client\Response;

interface IApiHttpService
{

    public function get(string $url, array $params):Response;
    public function post(string $url, array $params):Response;

}
