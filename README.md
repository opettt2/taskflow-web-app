# Laravel Task Manager

## Description

A web-based task management system built with Laravel and Tailwind CSS that allows users to create, edit, delete, and track tasks. Features include priority levels, due dates, task status (pending, in progress, completed), and a dashboard overview with statistics for total, completed, and pending tasks.

## Features

* User authentication (login/register)
* Create, read, update, delete tasks (CRUD)
* Task priority (low, medium, high)
* Task due dates
* Task status (pending, in progress, completed)
* Dashboard with task statistics
* Search and filter tasks by priority and status

## Tech Stack

* Backend: Laravel 12
* Frontend: Blade templates, Tailwind CSS
* Database: MySQL

## Installation

1. Clone the repository:

   ```bash
   git clone <repository-url>
   cd <project-folder>
   ```
2. Install dependencies:

   ```bash
   composer install
   npm install && npm run dev
   ```
3. Configure environment variables:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Set up the database in `.env` and run migrations:

   ```bash
   php artisan migrate
   ```
5. Start the development server:

   ```bash
   php artisan serve
   ```

## Usage

* Navigate to `/` to see your tasks.
* Click `+ Add Task` to create a new task.
* Edit, mark as completed, or delete tasks from the dashboard.
* Filter tasks by priority or status.

## Contributing

1. Fork the repository.
2. Create a new branch: `git checkout -b feature-name`
3. Make your changes and commit: `git commit -m 'Add feature'`
4. Push to the branch: `git push origin feature-name`
5. Open a pull request.

## License

This project is licensed under the MIT License.
