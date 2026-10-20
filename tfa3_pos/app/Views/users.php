<!DOCTYPE html>
<html>
<head><title>User Accounts</title></head>
<body>
<nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('about') ?>">About</a> |
    <a href="<?= base_url('customers') ?>">Customer Accounts</a> |
    <a href="<?= base_url('users') ?>">User Accounts</a>
</nav>

<h1>User Accounts</h1>
<p><a href="<?= base_url('users/new') ?>">Add New User</a></p>

<table border="1" cellpadding="10">
<thead><tr><th>Avatar</th><th>Username</th><th>Full Name</th><th>Created At</th><th>Action</th></tr></thead>
<tbody>
<?php foreach ($users as $user): ?>
<tr>
    <td><img src="<?= !empty($user['avatar']) ? base_url('uploads/' . $user['avatar']) : base_url('placeholder.svg') ?>" width="60" height="60" alt="User avatar"></td>
    <td><?= esc($user['username']) ?></td>
    <td><?= esc($user['full_name']) ?></td>
    <td><?= esc($user['created_at']) ?></td>
    <td><a href="<?= base_url('users/edit/' . $user['id']) ?>">Edit</a></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</body>
</html>
