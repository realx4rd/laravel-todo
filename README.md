# Laravel 8 Todo App

This is a simple Todo app with bulk edit and deletion of records

This is built on Laravel Framework 8. This was built for demonstrate purpose.

## Installation

Clone the repository-
```
git clone https://github.com/realx4rd/laravel-todo.git
```

Then cd into the folder with this command-
```
cd laravel-todo
```

Then do a composer install
```
composer install
```

Then create a environment file using this command-
```
cp .env.example .env
```

Then edit `.env` file with appropriate credential for your database server. Edit these two parameter(`DB_USERNAME`, `DB_PASSWORD`).

Then create a database named `todo_app` and then do a database migration using this command-
```
php artisan migrate
```

At last generate application key, which will be used for password hashing, session and cookie encryption etc.
```
php artisan key:generate
```

## Run server

Run server using this command-
```
php artisan serve
```

Then go to `http://localhost:8000` from your browser and see the app.

## Ask a question?

If you have any query please contact at realx4rd@gmail.com

## Screenshot

![Todo List](/screenshot/1.png)
![Add Todo](/screenshot/2.png)
![Edit Todo](/screenshot/3.png)

