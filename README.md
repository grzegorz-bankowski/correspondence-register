<p align="center">
    <a href="">
        <img src="public/img/envelope.jpg">
    </a>
</p>

# Correspondence Register

Correspondence Register is a microapplication I've written whose main task is to register incoming and outgoing correspondence for a company or other entity. In addition to adding letters, we can also view them in the form of summaries. Users are divided into basic users and administrators. Administrators can additionally add new users. The microapp was built from scratch with Laravel, one of the best and most popular PHP framework.

## Requirements

- PHP 8.0 - 8.2
- MySQL 5.7+
- Laravel 9.0

## Installation

1. Clone the repository, install composer and setup your .env file.

```
git clone https://github.com/grzegorz-bankowski/correspondence-register.git
composer install
```

2. Create the database 'Laravel' in MySQL 

```
CREATE DATABASE laravel;
```

3. Set email and password for users in /database/seeders/DataBaseSeeder/php

4. Run the initial migrations and seeders

```
php artisan migrate --seed
```

5. Run application and voila you are at home.

```
php artisan serve
```

## Screenshots

<p align="center">
    <img src="public/img/login.jpg">
    <hr style="height:1px">
    <img src="public/img/add-letter.jpg">
    <hr style="height:1px">
    <img src="public/img/browse.jpg">
</p>

## Live demo

- [Live demo](https://bankowski.dev/corresondence-register/)

## Feedback

If you have any feedback, please reach out to me at <grzegorz@bankowski.dev>
