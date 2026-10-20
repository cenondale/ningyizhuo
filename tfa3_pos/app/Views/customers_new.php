<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>New Customer</title></head>
<body>
<nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('customers') ?>">Customer Accounts</a> |
    <a href="<?= base_url('users') ?>">User Accounts</a> |
    <a href="<?= base_url('about') ?>">About</a>
</nav>

<h1>New Customer</h1>

<?php if (session('errors')): ?>
    <ul>
        <?php foreach (session('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" action="<?= base_url('customers/create') ?>">
    <label>Full Name:</label><br>
    <input type="text" name="full_name" value="<?= old('full_name') ?>"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= old('email') ?>"><br><br>

    <label>Phone:</label><br>
    <input type="text" name="phone" value="<?= old('phone') ?>"><br><br>

    <button type="submit">Save Customer</button>
</form>

<p><a href="<?= base_url('customers') ?>">Back to Customers</a></p>
</body>
</html>
