# MEDUSA Core

## Quick and dirty installation instructions

- Clone the repo

```
git clone git@github.com:MedusaApp/Core.git
```

- Install dependencies

```
composer install
```

- Publish assets

```
php artisan vendor:publish --tag=core.lang --tag=core.public
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

- Configure webserver to point to the installation
