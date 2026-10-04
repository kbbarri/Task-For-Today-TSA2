<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($title ?? 'Tasks for Today') ?></title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<header class="navbar">
    <div class="nav-container">
        <a href="<?= base_url('/') ?>" class="brand">
            Tasks for Today
        </a>

        <nav>
            <a href="<?= base_url('/') ?>">Today</a>
            <a href="<?= base_url('/tasks') ?>">Task List</a>
            <a href="<?= base_url('/profile') ?>">Profile</a>
            <a href="<?= base_url('/about') ?>">About</a>

            <?php if (session()->get('logged_in')): ?>
                <a href="<?= base_url('/logout') ?>">Logout</a>
            <?php else: ?>
                <a href="<?= base_url('/login') ?>">Login</a>
            <?php endif; ?>
        </nav>
    </div>
</header>

<main class="container">