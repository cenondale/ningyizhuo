<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome - Tasks for Today</title>
</head>
<body>

<nav>
    <a href="<?= base_url('/') ?>">Welcome</a> |
    <a href="<?= base_url('tasks') ?>">Task List</a> |
    <a href="<?= base_url('profile') ?>">Profile</a> |
    <a href="<?= base_url('about') ?>">About</a>
</nav>

<h1>Welcome to Tasks for Today</h1>

<p>Today's date: <?= esc($today) ?></p>

<h2>Today's Tasks</h2>

<?php if (empty($tasks)): ?>

    <p>No tasks are scheduled for today.</p>

<?php else: ?>

    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?= esc($task['title']) ?>
                — <?= esc($task['status']) ?>
            </li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>

</body>
</html>