# Установка Laravel
   
   git clone https://github.com/Zhasulan-123/laravel-vuejs.git

   cd laravel-vuejs

### 1 Установка зависомости
   
   php composer install
   
### 2 Создание .env
   
   php cp .env.example .env

### 3 Генерирование ключ
   
   php php artisan key:generate

### 4 Миграция таблицы

   php artisan migrate

### 5 Добавление категория и товар

  php artisan db:seed --class=CategoryTableSeeder

  php artisan db:seed --class=ProductsTableSeeder

# Установка Vuejs
   
   cd vuejs

   npm install

   npm run serve

# Postman rest-api

   ## Регистрация
  
   localhost:8083/api/register - POST

   headers Accept application/json

   body -> x-www-form-urlencoded  name Астана email astana@mail.ru password astana

   ## Авторизация

   localhost:8083/api/login - POST

   headers Accept application/json

   body -> x-www-form-urlencoded  email astana@mail.ru password astana

   ## Категория поиск

   http://127.0.0.1:8000/api/categories/search/Honor - GET

   ## Продукты поиск

   http://127.0.0.1:8000/api/products/search?query=OPPO A58 - GET

   ## Заказа списки

   http://127.0.0.1:8000/api/order - GET

   Bearer Token

   ## Заказа создание

   http://127.0.0.1:8000/api/order - POST

   Bearer Token
