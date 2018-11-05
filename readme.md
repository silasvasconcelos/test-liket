## Project Log reader
Project to test made in laravel 5.7

**Server dependencies**:
 - MariaDB ou MySql ou PostgreSql
 - PHP >= 7.1 (Recommended 7.1)
 - Nginx or Apache how reverse proxy (it's up to you)

**Deploy:**
clone this repository: `git clone https://github.com/silasvasconcelos/test-liket` 
enter into the folder: `cd test-liket`
copy env.example to .env: `php -r "copy('.env.example', '.env');"`
generate APP_KEY: `php artisan key:generate`
install packages with composer: `composer install`

**Configurer your Database connection on .env**

    DB_CONNECTION=mysql or  pgsql
    DB_HOST=127.0.0.1
    DB_PORT=3306 or 5432
    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret
  

Run migrations and seeds: `php artisan migrate --seed`

**Reading log file**
puts the logs file into ***game_logs*** in the folder ***public***
arter run the command `php artisan read-game-log` 

**Running tests**
Inside the project, run: `./vendor/bin/phpunit`  

if you want run the application local, run `php artisan serve` after access `http://localhost:8000`