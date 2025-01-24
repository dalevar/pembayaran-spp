# How To Install
clone project


## Create Database
use MYSQL or PostgreSQL

```sql
CREATE DATABASE pembayaran_spp;
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
rename **.env.example** to **.env** and change database setting

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pembayaran_spp
DB_USERNAME=root
DB_PASSWORD=
```

## Key Generate

```
php artisan key:generate
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
