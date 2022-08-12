<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## О проекте

MyStore - интернет-магазин одежды. Написан на стеке Laravel + Vue. Аутентификация и авторизация реализованы с помощью Laravel Sanctum + Laravel Fortify. 

<p align="center">
    На рисунках ниже представлены страницы авторизиции.
    ![image](https://user-images.githubusercontent.com/99824321/184366415-77c0cacb-89d8-4d5c-a843-f82644bb9228.png)
    ![image](https://user-images.githubusercontent.com/99824321/184366660-c52d5c7e-20d0-479e-a190-d4643354e9d0.png)

</p>
Для разграничение прав доступа пользователей используется ролевая модель.

Магазин разделен на две части, пользовательскую и панель адмнистратора. Пользовательская часть интерфейса написана на Vue. Основой панели администратора была выбрана панель от <a href="https://adminlte.io/">AdminLTE</a>, в последствии разбиитая на blade-компоненты.

После клонирования репозитория используйте команды composer install и npm install для установки всех необходимых зависимостей.
