<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Task List</title></head>
<body>
<nav><a href="<?= base_url('/') ?>">Welcome</a> | <a href="<?= base_url('tasks') ?>">Task List</a> | <a href="<?= base_url('profile') ?>">Profile</a> | <a href="<?= base_url('about') ?>">About</a></nav>
<h1>Complete Task List</h1>
<table border="1" cellpadding="8"><thead><tr><th>Title</th><th>Status</th><th>Task Date</th><th>Created At</th></tr></thead><tbody>
<?php foreach ($tasks as $task): ?><tr><td><?= esc($task['title']) ?></td><td><?= esc($task['status']) ?></td><td><?= esc($task['task_date']) ?></td><td><?= esc($task['created_at']) ?></td></tr><?php endforeach; ?>
</tbody></table>
</body></html>
