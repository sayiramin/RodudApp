<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Admin Panel - Order & User Management
## Introduction
This Admin Panel is a Laravel-based web application designed to:

- Manage Orders and User Data.
- Provide basic statistics on overall orders and user information.
- Display and handle Notifications when new orders are created.
- Facilitate user authentication for secure access.

## The panel includes:
- A Dashboard with summaries of total orders, delivered, pending, and in-progress statuses.
- Functionality to view, update, and manage orders and user details.
- Notification handling, including marking notifications as read.

# Features
- Dashboard: View key statistics (Total Orders, Delivered Orders, Pending Orders, Total Users).
- Orders Management: Manage and monitor orders (filter by status).
- User Management: Manage registered users.
- Notifications: Get notified on new order creation and mark notifications as read.
- Authentication: Secure login/logout system.

## Installation & Setup Guide
## Requirements
- PHP >= 8.3+
- Composer
- Laravel >= 11.x
- MySQL

### Steps to Install

##### 1. Clone the Repository
```
https://github.com/sayiramin/RodudApp.git
cd truck-booking-admin
```

##### 2. Install PHP dependencies using Composer
```composer install```

##### If you have front-end assets to compile, install JavaScript dependencies
```npm install```

##### 3. Copy the example .env file to .env
```cp .env.example .env```

##### 4. Generate the application key (if not set in the .env file)
```php artisan key:generate```

##### 5. Run database migrations to create the necessary tables
```php artisan migrate```

##### Optionally, run the seeders to populate the database with default data
```php artisan db:seed```

##### 6. Install Sanctum for API authentication
```php artisan sanctum:install```

##### 7. Start the Laravel development server
```php artisan serve```
