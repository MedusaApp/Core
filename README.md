# MEDUSA Core

## PHP Requirements
- PHP >= 7.1.3
- BCMath PHP Extension
- Ctype PHP Extension
- cURL PHP Extension
- Dom PHP Extension
- JSON PHP Extension
- Intl PHP Extension
- Mbstring PHP Extension
- Memcache PHP Extension (optional)
- Mysqli PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Redis PHP Extension (optional)
- Tokenizer PHP Extension
- XML PHP Extension
- Zip PHP Extension

Depending on how PHP was built or the package that you used, some, if not most of these extensions will already be compiled in.

## Required services
- Web server (nginx + php-fpm recommended)
- MySql/MariaDB server
- Redis/Memcache (optional)

## Suggested nginx configuration
```
server {
   # Change the port number as needed.  Most common alternate ports are 8000 or 8080
   listen 80;
   
   server_name example.com;
   root /path/to/public;

   add_header X-Frame-Options “SAMEORIGIN”;

   index index.html index.htm index.php;

   charset utf-8;

   location / {
       try_files $uri $uri/ /index.php?$query_string;
   }

   location = /favicon.ico { access_log off; log_not_found off; }
   location = /robots.txt  { access_log off; log_not_found off; }

   access_log /path/to/logs/nginx/<sitename>-access.log combined;
   error_log  /path/to/logs/nginx/<sitename>-error.log error;

   error_page 404 /index.php;

   location ~ \.php$ {
       fastcgi_split_path_info ^(.+\.php)(/.+)$;
       fastcgi_pass unix:/path/to/php-fpm.sock;
       fastcgi_index index.php;
       include fastcgi_params;
   }

   location ~ /\.ht {
       deny all;
   }
}
```

## Quick and dirty installation instructions

- Clone the repo

```
$ git clone https://github.com/MedusaApp/Core.git
```

- Install dependencies

```
$ cd core
$ composer install --no-dev
```
- Copy `.env.example` to `.env`
```
$ cp .env.example .env
```
- Generate application key
```
$ php artisan key:generate
```

- Update `.env`
  - Configure Database conection
  - Add `REG_TITLE` option and set
  - Set `APP_NAME`
  - Change `MAIL_DRIVER` to `mailgun`
  - Add `MAILGUN_DOMAIN` and `MAILGUN_SECRET`.  Get values from Dave
  
- If you are setting up a development environment, install the dev dependencies
```
$ composer install
```

- Publish assets

```
php artisan vendor:publish --tag=core.lang --tag=core.public --tag=core.database
```

- Create database

```
mysqladmin create <database name>
```

- Run database migrations
```
php artisan migrate
```
- Regenerate the autoload file
```
composer dump
```
- Run the database seeder to setup the roles
```
php artisan db:seed --class=BouncerSeeder
```

- Configure webserver to point to the installation
