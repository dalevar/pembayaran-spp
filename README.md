# How To Install

clone project

```
git clone https://github.com/Borneo-Infinity-Tech/hadir-sekolah-laravel.git
```

## Create Database

use MYSQL or PostgreSQL

```sql
CREATE DATABASE hadirsekolahdb;
```

## Install Composer and NPM in Project

### Composer

```
composer i
```

### NPM

```
npm i
```

## ENV Setting

rename .env.example to .env and change database setting

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hadirsekolahdb
DB_USERNAME=root
DB_PASSWORD=
```

## Key Generate

```
php artisan key:genrate
```

## Migration and Seeder Database

```
php artisan migrate
```

```
php artisan db:seed
```

## Run Project

```
php artisan serve
```

```
npm run dev
```

## Open In Browser

```
127.0.0.1:8000
```
