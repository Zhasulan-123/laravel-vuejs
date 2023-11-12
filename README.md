# Установка

1 Установка Laravel 
   
   git clone https://github.com/Zhasulan-123/laravel-vuejs.git

   cd laravel-vuejs

2 Установка зависомости
   
   php composer install
   
3 Создание .env
   
   php cp .env.example .env

4 Генерирование ключ
   
   php php artisan key:generate

5 Установка Vuejs
   
   cd vuejs

   npm install

7 Postman

   # Регистрация
  
   localhost:8083/api/register - POST

   headers Accept application/json

   body -> x-www-form-urlencoded  name Астана email astana@mail.ru password astana

   # Авторизация

   localhost:8083/api/login - POST

   headers Accept application/json

   body -> x-www-form-urlencoded  email astana@mail.ru password astana

   # Категория поиск

   http://127.0.0.1:8000/api/categories/search/Honor - GET

   # Продукты поиск

   http://127.0.0.1:8000/api/products/search?query=OPPO A58 - GET

   # Заказа

   http://127.0.0.1:8000/api/order - GET

   Bearer Token
