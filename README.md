## Installation guide

1. Zainstaluj docker
2. Zainstaluj docker-compose
3. Zainstaluj node i npm
4. Zmień właścicela katalogu na 1000:1000 rekurencyjnie
5. Wykonaj polecenie `npm install`
6. Wykonaj polecenie `npm run prod`
7. Wykonaj polecenie `sudo docker-compose up -d`
8. Wykonaj polecenie `sudo docker-compose run --rm weather_app composer install`
9. Wykonaj polecenie `sudo docker-compose run --rm weather_app php artisan migrate`
10. Przejdź pod link http://localhost:8080 
