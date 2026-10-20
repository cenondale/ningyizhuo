<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Edit User</title></head>
<body>
<nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('customers') ?>">Customer Accounts</a> |
    <a href="<?= base_url('users') ?>">User Accounts</a> |
    <a href="<?= base_url('about') ?>">About</a>
</nav>

<h1>Edit User</h1>

<?php if (session('errors')): ?>
    <ul>
        <?php foreach (session('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" enctype="multipart/form-data" action="<?= base_url('users/update/' . $user['id']) ?>">
    <label>Username:</label><br>
    <input type="text" name="username" value="<?= old('username', $user['username']) ?>"><br><br>

    <label>Full Name:</label><br>
    <input type="text" name="full_name" value="<?= old('full_name', $user['full_name']) ?>"><br><br>

    <label>Avatar (JPG or PNG, maximum 2 MB):</label><br>
    <input type="file" name="avatar" accept=".jpg,.jpeg,.png"><br><br>

    <?php if (!empty($user['avatar'])): ?>
        <p>Current avatar:</p>
        <img src="<?= base_url('uploads/' . $user['avatar']) ?>" width="100" height="100" alt="Current avatar">
    <?php endif; ?>

    <br><button type="submit">Update User</button>
</form>

<p><a href="<?= base_url('users') ?>">Back to Users</a></p>
</body>
</html>
