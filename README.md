# Laravel Task Management System

A Laravel-based task management system for educational institutions. It allows headmasters to assign tasks to teachers, and teachers to assign tasks to students.

## Features

- Role-based user registration and login (Headmaster, Teacher, Student)
- Task assignment and delegation system
- Secure authentication with Laravel Breeze
- Clean and responsive user interface using Blade components
- Built with Laravel 10 and MySQL

## Requirements

- PHP >= 8.1
- Composer
- MySQL
- Node.js and NPM (for front-end assets)
- Laravel 10+

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/SaimoomNbs/Task-Mangement.git
   cd Task-Mangement

2. Install PHP dependencies:
    ```bash
    composer install

3. Copy the .env file and set your environment variables:
    ```bash
    copy .env.example .env

4. Generate application key:
    ```bash
    php artisan key:generate

5. find sql file in mail and upload it in your database. 

6. Install front-end dependencies:
    ```bash
    npm install && npm run dev

7. Start the local development server:
    ```bash 
    php artisan serve

8. Usage:
    - Register as a Headmaster, Teacher, or Student
    - Headmasters can assign tasks to Teachers
    - Teachers can assign tasks to Students
    - Users can view their assigned tasks in the dashboard
    - headmaster login id & pass (headmaster@gmail.com)
    - teacher login id & pass (teacher@gmail.com)
    - student login id & pass (student@gmail.com)
