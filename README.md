<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## О проекте

MyStore - интернет-магазин одежды. Написан на стеке Laravel + Vue. 

![image](https://user-images.githubusercontent.com/99824321/184371469-e205b03d-8649-4609-8988-7100a48e4b4e.png)

Каждый товар в представленный в магазине может быть найдем при помощи фильтров.

![image](https://user-images.githubusercontent.com/99824321/184372586-c97426c8-3dc4-4bf0-a045-7f56f572c19e.png)

Каждый пользователь имеет свою корзину покупателя вне зависимости от того авторизован он или нет, но для того что бы совершить покупку придется войти в систему.

![image](https://user-images.githubusercontent.com/99824321/184372996-c05f2b96-e983-4320-9035-8e41962be2e9.png)


Аутентификация реализована с помощью Laravel Sanctum + Laravel Fortify. 

На рисунках ниже представлены страницы Аутентификация.
<p align="center">
    <img src="https://user-images.githubusercontent.com/99824321/184367092-83275420-34fc-4cbb-a3bb-6d4526b68fd8.png"/>
    Страница регистрации
</p>
<p align="center">
    <img src="https://user-images.githubusercontent.com/99824321/184368725-2f9df231-c137-4ea5-a5f8-8c7c8002a272.png"/>
    Страница авторизации
</p>

Для разграничение прав доступа пользователей используется ролевая модель. Пользователь имеющий роль администратора имеет доступ к панелидля управления сайтом.
В основы панели администратора легла <a href="https://adminlte.io/">AdminLTE</a>.
<p align="center">
    <img src="https://user-images.githubusercontent.com/99824321/184370222-cf1abaae-7d95-4b2d-b9c3-efa2ea1eea86.png"/>
</p>
Администратор имеет все необходимые функции для управления сайтом. Для каждого раздела в управлении реализован собственный CRUD.

<p align="center">
    <img src="https://user-images.githubusercontent.com/99824321/184531479-5b861420-1c36-4e9e-a09a-1715fce6be81.png">
    Страница со всеми товарами.
    <img src="https://user-images.githubusercontent.com/99824321/184531509-08a18c9e-251b-426e-b1b2-58c664f57fc5.png">
    Страница товара
    <img src="https://user-images.githubusercontent.com/99824321/184531528-66fbaf21-576b-4f39-a905-5dbfbfeec35d.png">
    Страница редактирования
</p>

Остальные разделы выглядят примерно так же.

После клонирования репозитория используйте команды composer install и npm install для установки всех необходимых зависимостей.
