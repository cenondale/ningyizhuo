<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Tasks for Today</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        header {
            background: #2563eb;
            color: white;
            padding: 35px 10%;
        }

        nav {
            margin-bottom: 35px;
        }

        nav a {
            color: white;
            margin-right: 20px;
            text-decoration: none;
        }

        main {
            max-width: 1000px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .welcome-card {
            background: white;
            padding: 28px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #0002;
            margin-bottom: 25px;
        }

        .task-card {
            background: white;
            padding: 18px;
            margin: 12px 0;
            border-left: 5px solid #2563eb;
            border-radius: 8px;
            box-shadow: 0 2px 6px #0001;
        }

        .status {
            color: #64748b;
            font-size: 14px;
        }

        .empty {
            background: white;
            padding: 25px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<header>
    <nav>
        <a href="<?= base_url('/') ?>">Welcome</a>
        <a href="<?= base_url('tasks') ?>">Task List</a>
        <a href="<?= base_url('profile') ?>">Profile</a>
        <a href="<?= base_url('about') ?>">About</a>
    </nav>

    <h1>Good day!</h1>
    <p>Here are your tasks for today.</p>
</header>

<main>
    <section class="welcome-card">
        <h2><?= esc(date('F j, Y', strtotime($today))) ?></h2>
        <p>You have <?= count($tasks) ?> task(s) scheduled for today.</p>
    </section>

    <h2>Today's Tasks</h2>

    <?php if (empty($tasks)): ?>
        <div class="empty">
            No tasks are scheduled for today.
        </div>
    <?php else: ?>
        <?php foreach ($tasks as $task): ?>
            <div class="task-card">
                <h3><?= esc($task['title']) ?></h3>
                <p class="status">
                    Status: <?= esc(ucfirst($task['status'])) ?>
                </p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</main>

</body>
</html>