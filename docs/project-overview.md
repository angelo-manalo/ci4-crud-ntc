# Project Overview

## Summary

This project is a CodeIgniter 4 CRUD application with authentication and protected record management pages.

## Core Areas

- Authentication for registration, login, and logout
- Protected dashboard for signed-in users
- Records CRUD module for create, read, update, and delete operations
- Bootstrap-based layouts and forms

## User Flow

1. Register or sign in.
2. Access the dashboard.
3. Open the records page.
4. Create, review, update, or delete records.

## Main Application Files

- `app/Controllers/Auth.php`
- `app/Controllers/Records.php`
- `app/Models/UserModel.php`
- `app/Models/RecordModel.php`
- `app/Filters/AuthFilter.php`
- `app/Filters/GuestFilter.php`
- `app/Config/Routes.php`

## Views

- `app/Views/dashboard.php`
- `app/Views/auth/`
- `app/Views/records/`

## Notes

- The project includes a SQL dump for local setup.
- The records module uses authenticated routes.
- The UI screenshots in the root README reflect the current application flow.
