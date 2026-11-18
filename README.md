# SimplePOS Laravel — TFA6: From Arrays to Eloquent

A four-page Laravel 13 POS foundations project that upgrades the TFA5 customer and staff listings from controller arrays to SQLite-backed Eloquent models.

## Included

- Home, About, Customer Accounts, and User Accounts pages with shared navigation.
- Customer and User Eloquent models.
- Migrations matching the TFA2 schema: `customers` has `full_name`, `email`, `phone`, and `created_at`; `users` has unique `username`, `full_name`, and `created_at`.
- `CustomerSeeder` and `UserSeeder`, with five sample records in each table. `DatabaseSeeder` calls both.
- Controllers retrieve rows through Eloquent models; Blade views display the returned collections with loops.
- `.env.example` setup template. A populated `.env` and the `vendor/` directory are not included.

The `users` schema does not contain a `role` column, so the user listing shows the database fields provided by the activity rather than inventing a role value.

## Requirements

- PHP 8.3 or newer with Laravel's required extensions.
- Composer 2.
- PHP SQLite PDO extension.

## Setup on Windows PowerShell

Open PowerShell in this project folder and run:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
if (!(Test-Path database/database.sqlite)) { New-Item -ItemType File -Path database/database.sqlite | Out-Null }
php artisan migrate --seed
php artisan serve
```

Then open `http://127.0.0.1:8000`.

## Setup on macOS or Linux

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
php artisan serve
```

Then open `http://127.0.0.1:8000`.

## Pages

| URL | Purpose |
| --- | --- |
| `/` | Landing page |
| `/about` | Project and MVC explanation |
| `/customers` | Customer rows loaded through `App\\Models\\Customer` |
| `/users` | User rows loaded through `App\\Models\\User` |

## Main files

- `routes/web.php` — route definitions.
- `app/Http/Controllers/` — page/account controllers.
- `app/Models/` — Eloquent models for `customers` and `users`.
- `database/migrations/` — table definitions.
- `database/seeders/` — sample database records.
- `resources/views/` — Blade page templates.
