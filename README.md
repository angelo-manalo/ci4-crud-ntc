# CI4 CRUD EXAM

Minimal authenticated CRUD application built with CodeIgniter 4.

This root README is intentionally short for GitHub readers. It covers the basics, shows the UI, and links to more detailed documentation under `docs/`.

## Highlights

- User registration and login
- Protected dashboard
- Records CRUD workflow
- Bootstrap-based UI
- Local database setup with SQL import or migrations

## Quick Start

### 1. Clone the repository

```bash
git clone https://github.com/angelo-manalo/ci4-crud-ntc.git
cd ci4-crud-ntc
```

### 2. Install dependencies

```bash
composer install
```

### 3. Configure the environment

Copy `env` to `.env`, then set your local database values.

Example:

```env
CI_ENVIRONMENT = development

database.default.hostname = localhost
database.default.database = ci4_crud_exam
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

### 4. Prepare the database

Use one of the following:

- Import `ci4_crud_exam.sql` into a local database named `ci4_crud_exam`
- Or run migrations

```bash
php spark migrate
```

### 5. Run the application

```bash
php spark serve
```

Open `http://localhost:8080` in your browser.

### 6. Create a local account

Register a local user through `/register`, or use your own local data after importing the SQL dump.

## Screenshots

### Login
![Login page](docs/screenshots/login.png)

### Register
![Register page](docs/screenshots/register.png)

### Dashboard
![Dashboard](docs/screenshots/dashboard.png)

### Records
![Records page](docs/screenshots/records.png)

## Documentation

- [Documentation Hub](docs/README.md)
- [Setup Guide](docs/setup-guide.md)
- [Project Overview](docs/project-overview.md)

## Tech Stack

- PHP 8.1+
- CodeIgniter 4
- Bootstrap 5
- MySQL or MariaDB
