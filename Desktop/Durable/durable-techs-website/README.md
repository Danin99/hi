**Demo:** http://localhost:8000/admin/login
```
Username - superadmin
password - 12345678
```

## Requirements:
- Laravel `7.x` | `9.7` | `11.x`
- Spatie role permission package  `^6.4`

## Project Setup
Git clone -
```console
git clone https://github.com/LisoingSem/durable-techs-website.git
```

Go to project folder -
```console
cd durable-techs-website
```

Install Laravel Dependencies -
```console
composer update
```

```console
composer install
```

```console
npm install
```

Create database called - `durable_techs_db`

Create `.env` file by copying `.env.example` file

Generate Artisan Key (If needed) -
```console
php artisan key:generate
```

Migrate Database with seeder -
```console
php artisan migrate --seed
```

Run Project -
```php
npm run serve
```

So, You've got the project of Laravel Role & Permission Management on your http://localhost:8000

## How it works
1. Login using Super Admin Credential -
    1. Username - `superadmin`
    1. Password - `12345678`
2. Create Admin
3. Create Role
4. Assign Permission to Roles
5. Assign Multiple Role to an admin
6. Check by login with the new credentials.
7. If you've not enough permission to do any task, you'll get a warning message.
