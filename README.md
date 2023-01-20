# Project Template: Statamic

Boilerplate for Statamic projects.

## Getting Started

Setup local .env file
```
cp .env.example .env
```

Install Composer dependencies
```
composer install
```

Update dependencies (skeleton will be updated from time to time, but you may want to start with the latest package versions)
```
composer update
```

Generate an app key
```
php artisan key:generate
```

### Database

Generate a database and set your credentials in .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your-project-database
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations
```
php artisan migrate
```

### Assets

(optional) Generate assets
```
yarn
yarn dev
yarn watch
```

### Using Docker

If you are using docker go ahead and replace every "statamic-skeleton" in the `docker-compose.yml` with your project name and run `./vendor/bin/sail up -d` to start all the services.

Your app is now available on http://project-name-cms.novu.io.

## Run tests

```
php artisan test
```

## Lint code
PHP CS Fixer will also run on every push in a Github Action (see .github/workflows/php-cs-fixer.yml)
```
composer lint
```


sentry release test
