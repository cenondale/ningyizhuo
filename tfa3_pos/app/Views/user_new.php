<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>New User</title></head>
<body>
<nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('customers') ?>">Customer Accounts</a> |
    <a href="<?= base_url('users') ?>">User Accounts</a> |
    <a href="<?= base_url('about') ?>">About</a>
</nav>

<h1>New User</h1>

<?php if (session('errors')): ?>
    <ul>
        <?php foreach (session('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" action="<?= base_url('users/create') ?>">
    <label>Username:</label><br>
    <input type="text" name="username" value="<?= old('username') ?>"><br><br>

    <label>Full Name:</label><br>
    <input type="text" name="full_name" value="<?= old('full_name') ?>"><br><br>

    <button type="submit">Save User</button>
</form>

<p><a href="<?= base_url('users') ?>">Back to Users</a></p>
</body>
</html>
