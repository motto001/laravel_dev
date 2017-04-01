<p align="center">Telepítés clonozassal (vs code).</p>
új ablakot nyitni(File/New Window), Start/clone git repository. Felsőablakban bekéri a repo url-jét:https://github.com/motto001/laravel_dev . Verziót így nem lehet telepíteni csak kompozerrel. Viszont akkor csinálni kell egy új üres repot. Clonozni, composerrel telepíteni a megfelelő verziót majd commit, push. Fejlesztésnél érdemes ezt használni, mert ha composerrel telepítünk nem lehet összehangolni a repositorikat.(nem tudjuk push-olni csak egy másik repositoriba.) Telepítési mappának egy szintel fentebbi mappát kell megadni, mert létrehoz benne egy repositori nevével megegyező mappát. figyelni kell hogy ne legyen már készen.
utána belépni a project könyvtárba :
composer update (létrehozza a vendor könyvtárakat) 
<p align="center">Telepítés composerrel.</p>
egyes verzio:</br>
composer create-project motto001/laravel_dev:1.0.0 project_nev</br>
nem kell léterhozni a project mappáját! a composer létrehozza a project nevével megegyezően (project_nev) abban a mappában amiben kiadjuk a parancsot.</br>
composer require motto001/laravel_dev 1.0.0</br> 
ekkor  a vendor mappába telepíti a csomagot</br>

fejlesztői:</br> 
composer create-project motto001/laravel_dev:dev-master vagy composer require motto001/laravel_dev:dev-master (ha csomagként kell. </br>
Figyelem! csak akakor működik ha van a https://packagist.org -on van telepítő csomag készítve.
<p align="center">ha kell:</p>
composer update (létrehozza a vendor könyvtárakat), .env file létrehozás szerkesztés,php artisan vendor publish, php artisan migrate --seed (adatbázis)
