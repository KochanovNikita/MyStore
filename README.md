<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## О проекте

MyStore - интернет-магазин одежды. Написан на стеке Laravel + Vue. Аутентификация и авторизация реализованы с помощью Laravel Sanctum + Laravel Fortify. 

На рисунках ниже представлены страницы авторизиции.
<p align="center">
    <img src="https://user-images.githubusercontent.com/99824321/184367092-83275420-34fc-4cbb-a3bb-6d4526b68fd8.png"/>
    Страница регистрации
</p>
<p align="center"
   ![image](https://user-images.githubusercontent.com/99824321/184368492-97f73c32-66b0-4d31-81b3-84394bf28f5e.png)

     <img src="https://user-images.githubusercontent.com/99824321/184368324-98c970aa-db59-48a3-b695-7783083727d5.png"/>
    Страница авторизации
</p>

Для разграничение прав доступа пользователей используется ролевая модель.

Магазин разделен на две части, пользовательскую и панель адмнистратора. Пользовательская часть интерфейса написана на Vue. Основой панели администратора была выбрана панель от <a href="https://adminlte.io/">AdminLTE</a>, в последствии разбиитая на blade-компоненты.

После клонирования репозитория используйте команды composer install и npm install для установки всех необходимых зависимостей.
