<p align="center">Telepítés</p>

be kell lépni a telepítendő mappába majd:</br>


egyes verzio:</br>
composer require motto001/laravel_dev 1.0.0 ekkor csak a vendor mappát készíti el és belemásolja motto001 mappába a projectet</br>
composer create-project motto001/laravel_dev:1.0.0 project_nev</br>
fejlesztői:</br> 
composer create-project motto001/laravel_dev:dev-master vagy composer require motto001/laravel_dev:dev-master (ha csomagként kell. </br>
Figyelem! csak akakor működik ha van a https://packagist.org -on telepítő csomag készítve 
<p align="center">ha kell:</p>composer update,vendor publish
.env file szerkesztés majd: php artisan migrate --seed

