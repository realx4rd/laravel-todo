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

Then edit `.env` file with appropriate credential for your database server. Just edit these two parameter(`DB_USERNAME`, `DB_PASSWORD`).

Then create a database named `todos` and then do a database migration using this command-
```
php artisan migrate
```


## Run server

Run server using this command-
```
php artisan serve
```

Then go to `http://localhost:8000` from your browser and see the app.

## Ask a question?

If you have any query please contact at realx4rd@gmail.com



