PHP 7.4.x && Laravel 8.x && SQLite

* `.env` file is included
* create DB `touch database/database.sqlite`
* edit `.env` with abs path to sqlite `DB_DATABASE=______`
* load employees from API via `artisan employee:load`
* view them on project root path `/`, or in view `employees_list.blade`
