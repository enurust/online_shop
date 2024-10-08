# My Laravel Project

## Описание

Это пример проекта, созданного с использованием Laravel и Jetstream. Этот проект представляет собой простейший онлайн-магазин, где пользователи могут просматривать товары, добавлять их в корзину и оформлять заказы. Администраторы могут управлять заказами.

## Установка

1. **Клонировать репозиторий**:

   ```bash
   git clone https://github.com/enurust/online_shop.git
   cd my-laravel-project

2. Установить зависимости:
Убедитесь, что у вас установлен Composer и выполните:
composer install
3. Настройка окружения:
Скопируйте файл .env.example в .env:
    cp .env.example .env
4. Сгенерировать ключ приложения:
    php artisan key:generate
5.Создание базы данных:
Запустите миграции для создания необходимых таблиц:
    php artisan migrate --see
6. Использование
Запустите сервер разработки:
    php artisan serve
Перейдите по адресу http://localhost:8000 в вашем браузере.
Для регистрации пользователя используйте встроенные возможности Jetstream.

Функциональность
Пользователи могут:

Просматривать товары
Добавлять товары в корзину
Оформлять заказы
Просматривать свои заказы
Администраторы могут:

Просматривать все заказы
Изменять статус заказов (подтвержденный или отмененный)
Управлять пользователями
Технологии
Laravel 10
PHP 8.3
MySQL 8.2
Jetstream

Администратор:
email: admin@gmail.com
password :password

Пользователь
email: user@gmail.com
password: password
