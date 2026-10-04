# Tasks for Today Management System

A simple task management web application built using **CodeIgniter 4** and **MySQL**.

The system allows users to view their daily tasks and manage tasks through a simple web interface.

## Features

- View tasks scheduled for today
- View all tasks
- User profile page
- User login and logout
- Create new tasks
- Edit existing tasks
- Update task status and date
- Archive tasks using soft deletion
- Form validation
- Protected task management for logged-in users

## Technologies Used

- CodeIgniter 4
- PHP
- MySQL
- HTML
- CSS
- XAMPP
- phpMyAdmin

## Pages

| Page | Route |
|---|---|
| Tasks for Today | `/` |
| Task List | `/tasks` |
| Profile | `/profile` |
| About | `/about` |
| Login | `/login` |
| New Task | `/tasks/new` |

## Database

The system uses a MySQL database named:

`tasks_for_today_tsa2`

It contains two tables:

- `tasks` - stores task information
- `users` - stores user account information

Tasks use soft deletion. Deleted tasks remain in the database with `is_archived = 1` but are no longer displayed in the task lists.

User passwords are stored as hashed passwords.

## How to Run

1. Start **MySQL** in XAMPP.
2. Create a database named `tasks_for_today_tsa2` in phpMyAdmin.
3. Import `database/tasks_for_today_tsa2.sql`.
4. Configure the database connection in `.env`.
5. Open a terminal in the project folder.
6. Run:

```bash
php spark serve
```

7. Open:

`http://localhost:8080`

## Demo Login

**Username:** `demo_user`

**Password:** `password123`
