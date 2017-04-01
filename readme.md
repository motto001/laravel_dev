<p align="center">Telepítés</p>

be kell lépni a telepítendő mappába majd:</br>


egyes verzio:</br>
composer create-project motto001/laravel_dev:1.0.0 project_nev</br>
nem kell léterhozni a project mappáját! a composer létrehozza a project nevével megegyezően (project_nev) abban a mappában amiben kiadjuk a parancsot.</br>
composer require motto001/laravel_dev 1.0.0</br> 
ekkor  a vendor mappába telepíti a csomagot</br>

fejlesztői:</br> 
composer create-project motto001/laravel_dev:dev-master vagy composer require motto001/laravel_dev:dev-master (ha csomagként kell. </br>
Figyelem! csak akakor működik ha van a https://packagist.org -on van telepítő csomag készítve.
<p align="center">ha kell:</p>composer update,vendor publish
.env file szerkesztés majd: php artisan migrate --seed

