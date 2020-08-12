@extends('layout')

@section('content')


    <div class="container">
        <div class="jumbotron bg-white shadow-sm mt-4 pt-1">
            <p class="small text-secondary text-right mb-2">Ostatnie odświeżenie nastąpiło {{$weather["last_api_update"]}}</p>
            <h3 class="lead text-center">Aktualne dane o pogodzie w Warszawie</h3>
            <div class="row">

                <div class="display-4 current-degrees col-4 mt-3">
                    <img class="mr-2" src="{{asset("img/{$weather["current"]["weather"][0]["main"]}.svg")}}" alt="">
                    <h1 class="mt-1">
                        {{round($weather["current"]["temp"])}}°
                    </h1>
                    <h5 >
                        {{$weather["current"]["weather"][0]["description"]}}
                    </h5>
                </div>

                <div class="display-4 current-degrees col-4 mt-3">
                    <img class="mr-2" src="{{asset("img/wind/{$weather["current"]["wind_score"]}.svg")}}" alt="">
                    <h1 class="mt-1">
                        {{$weather["current"]["wind_speed"]}} m/s
                    </h1>
                    <h5 >
                    </h5>
                </div>

                <div class="display-4 current-degrees col-4 mt-3">
                    <img class="mr-2" src="{{asset("img/sunset.svg")}}" alt="">
                    <h1 class="mt-1">
                        {{(new DateTime("", new DateTimeZone("Europe/Warsaw")))->setTimestamp($weather["current"]["sunset"])->format("H:i:s")}}
                    </h1>
                    <h5>
                        Zachód słońca
                    </h5>
                </div>
            </div>
            <hr class="my-4">

            <h4 class="mb-2">Prognoza na najbliższe 24 godziny</h4>
            <div class="hourly">
                @foreach(array_slice($weather["hourly"],0,24) as $w)
                <div class="col-xs-3 mr-5">
                    <div class="w-100 d-flex justify-content-center">
                        <img class="mr-2" src="{{asset("img/{$w["weather"][0]["main"]}.svg")}}" alt="">
                    </div>
                    <h1 class="mt-1 text-center">
                        {{round($w["temp"])}}°
                    </h1>
                    <h4 class="small">
                        {{(new DateTime("", new DateTimeZone("Europe/Warsaw")))->setTimestamp($w["dt"])->format("H:i")}}
                    </h4>
                    <h5 class="small">
                        {{$w["weather"][0]["description"]}}
                    </h5>
                </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
