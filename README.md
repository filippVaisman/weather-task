## Installation guide

1. Zainstaluj docker
2. Zainstaluj docker-compose
3. Zmień właścicela katalogu na 1000:1000 rekurencyjnie
4. Wykonaj polecenie `sudo docker-compose run --rm weather_app composer install`
5. Wykonaj polecenie `sudo docker-compose run --rm weather_app npm install`
6. Wykonaj polecenie `sudo docker-compose run up -d`
7. Wykonaj polecenie `sudo docker-compose run --rm weather_app php artisan migrate`
8. Przejdź pod link http://localhost:8080 
