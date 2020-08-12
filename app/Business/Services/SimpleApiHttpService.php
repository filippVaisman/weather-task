<?php


namespace App\Business\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use App\Business\Services\Interfaces\IApiHttpService;

class SimpleApiHttpService implements IApiHttpService
{

    public function get(string $url, array $params): Response
    {
        $paramsString = http_build_query($params);
        $url = $url."?".$paramsString;
        return Http::get($url, $params);

    }

    public function post(string $url, array $params): Response
    {
        throw new \Exception("not implemented");
    }
}
