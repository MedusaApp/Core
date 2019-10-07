# MEDUSA Core

## Quick and dirty installation instructions

- Clone the repo

```
$ git clone git@github.com:MedusaApp/Core.git
```

- Install dependencies

```
$ cd core
$ composer install
```
- Copy `.env.example` to `.env`
```
$ cp .env.example .env
```
- Generate application key
```
$ php artisan key:generate
```

- Publish assets

```
php artisan vendor:publish --tag=core.lang --tag=core.public --tag=core.database
```

- Update `.env`
  - Configure Database conection
  - Add `REG_TITLE` option and set
  - Set `APP_NAME`
  - Change `MAIL_DRIVER` to `mailgun`
  - Add `MAILGUN_DOMAIN` and `MAILGUN_SECRET`.  Get values from Dave
  
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
