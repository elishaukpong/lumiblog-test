## LUMIFORM BLOG

### preparing to run on Mac

1. add to `docker-compose.yml`
```yaml
db:
    container_name: db
```

2. copy `.env.example` to `.env` and change
```ini
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:zzlO1zURj6B/A3F/kC2JW9Ft1RkfcMW+6ctnxK8H5Uw=
APP_DEBUG=true
APP_URL=http://localhost
APP_PORT=8081

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
   
3. `sudo nano /etc/hosts` and add
   `127.0.0.1 db`
   
4. then run `composer install` and `php artisan migrate --seed`
   then restart docker and it will be on http://localhost:8081
   `docker compose down && docker compose up -d`

5. to get into admin, register a new user and changed his role to 1 in `model_has_roles`

### Installation Steps

Clone Project  \
Run the following commands \
`./develop start` \
`./develop composer install` \
`./develop art migrate --seed`

### You are good to go

127.0.0.1:8080 will load up the project

