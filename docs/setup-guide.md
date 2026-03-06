# Setup Guide

This guide expands on the quick start instructions from the root README.

## Requirements

- PHP 8.1 or higher
- Composer
- MySQL or MariaDB
- A local server environment such as XAMPP, Laragon, or WAMP

## Clone the Repository

```bash
git clone https://github.com/angelo-manalo/ci4-crud-ntc.git
cd ci4-crud-ntc
```

## Install PHP Dependencies

```bash
composer install
```

## Configure the Environment

Copy `env` to `.env`.

Then configure the database connection:

```env
CI_ENVIRONMENT = development

database.default.hostname = localhost
database.default.database = ci4_crud_exam
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

You can also update the same values directly in `app/Config/Database.php` if you do not want to rely on `.env`.

## Database Setup

Choose one approach.

### Option A: Import the SQL dump

Import `ci4_crud_exam.sql` into a local database named `ci4_crud_exam`.

Example command:

```bash
mysql -u root -p ci4_crud_exam < ci4_crud_exam.sql
```

### Option B: Run migrations

```bash
php spark migrate
```

If you use migrations instead of the SQL dump, register a local user through the app after startup.

## Run the Application

```bash
php spark serve
```

Open:

```text
http://localhost:8080
```

## First Login Flow

1. Open `/register` if you need a fresh local account.
2. Sign in through `/login`.
3. Open the dashboard.
4. Continue to the records module.

## Troubleshooting

- If the app cannot connect to the database, recheck `.env` or `app/Config/Database.php`.
- If port `8080` is already in use, stop the conflicting process or run the server on another port.
- If you skipped the SQL import, make sure migrations completed before testing CRUD flows.
