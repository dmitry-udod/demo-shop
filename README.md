## Demo shop

### Setup for local dev

Run next commands in your terminal:

1. composer install
1. php artisan key:generate --ansi
1. yarn install
1. yarn build
1. sudo chmod o+w ./storage/ -R
1.  ./vendor/bin/sail up
1.  ./vendor/bin/sail artisan migrate:fresh --seed
1. Open http://localhost/login in your browser

### Tests
```bash
php artisan test
```
