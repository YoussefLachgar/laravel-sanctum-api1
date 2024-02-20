<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel Sanctum API with User and Task Entities:

<p>This repository contains a Laravel application set up with Laravel Sanctum for API authentication and authorization. It includes functionalities for registering users, logging in/out, and managing tasks associated with each user.</p>

## Features
User Management: Allows users to register, login, and logout.
Task Management: Users can perform CRUD operations on tasks, including creating, reading, updating, and deleting tasks.
Authentication: Utilizes Laravel Sanctum for token-based API authentication.
Authorization: Implements authorization checks to ensure users can only access their own tasks.

## API Endpoints

# Register: POST /api/register
Create a new user account.
Request body: { "name": "John Doe", "email": "john@example.com", "password": "secret" }
# Login: POST /api/login
Authenticate a user and generate an API token.
Request body: { "email": "john@example.com", "password": "secret" }
# Logout: POST /api/logout
Invalidate the user's API token.
Requires authentication.
# Tasks:
GET /api/tasks: Retrieve all tasks for the authenticated user.
POST /api/tasks: Create a new task for the authenticated user.
GET /api/tasks/{id}: Retrieve a specific task.
PUT /api/tasks/{id}: Update a task.
DELETE /api/tasks/{id}: Delete a task.

