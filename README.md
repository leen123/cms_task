<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>



# Content Management System (CMS) - Partial Test

This project is a partial test for a Content Management System (CMS) built using PHP 8.2 and Laravel 10.

## Requirements

- PHP ^8.1
- Composer
- Laravel 10

## Installation

1. Clone the project repository to your computer.

2. Open the `.env.example` file and rename it to `.env`. Configure the environment to match your setup.

3. Update the `APP_URL` in the `.env` file to http://localhost:8000.


4. Install the dependencies using Composer:

    ```bash
    composer install
    ```

5. Generate the application key:

    ```bash
    php artisan key:generate
    ```

6. Run the site using the following command:

    ```bash
    php artisan serve
    ```
    
7. Open a terminal and navigate to the project folder.


8. Open a second terminal and run the following command to run the migration and seed the database:

    ```bash
    php artisan migrate:fresh --seed
    ```

Note: Steps 6,  7, and 8 are necessary to create the tables and read permissions from the `permission.json` file and transfer them to the database.

