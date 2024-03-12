# **Student_management**

## Overview

The system developed using Laravel Breeze, a minimal authentication scaffolding for Laravel, along with a MySQL database. This system allows users to register, login, write blog , edit blog , delete blog , display blogs .

## Features

-   User Authentication (Registration, Login, Logout)
-   Blog (Create, Read, Update, Delete)

## Requirements

-   PHP = 8.3.
-   Composer = 2.5.4
-   Node.js & NPM
-   MySQL

## installation

Step 1: Clone the Repository

Clone the repository to your local machine using Git.

```bash
$ git clone https://github.com/Akshatzignuts/Student_management
```

Step 2: Navigate to the Project Directory

Change your current directory to the project directory.

```bash
$ cd Student_management
```

Step 3: Install Composer Dependencies

Install the PHP dependencies using Composer.

```bash
$ composer install
```

Step 4: Install NPM Dependencies

Install the JavaScript dependencies using NPM.

```bash
$ npm install
```

Step 5: Copy the Environment File

Copy the .env.example file to .env.

```bash
$ cp .env.example .env
```

Step 6: Generate Application Key

Generate an application key.

```bash
$ php artisan key:generate
```

Step 7: Configure Database Connection

Configure your database connection in the .env file.

```make
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

Step 8: Run Migrations

Run database migrations to create database tables and populate them with initial data.

```bash
$ php artisan migrate
```

Step 9: Compile Assets

Compile assets using Laravel Mix.

```bash
$ npm run dev
```

Step 10: Start the Development Server

Start the development server to run the application.

```bash
$ php artisan serve
```

Step 11: Access the Application

Open your web browser and visit http://localhost:8000 to access the application.
