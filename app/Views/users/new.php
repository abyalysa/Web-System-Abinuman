<h1>Add New User</h1>
<?php if (isset($validation)): ?>
    <div style="color:red;"><?= $validation->listErrors() ?></div>
<?php endif; ?>

<form action="<?= base_url('users/create') ?>" method="post">
    <?= csrf_field() ?>
    <p>
        <label>Username:</label><br>
        <input type="text" name="username" value="<?= old('username') ?>">
    </p>
    <p>
        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="<?= old('full_name') ?>">
    </p>
    <p>
        <label>Password: </label><br>
        <input type="password" name="password">
    </p>
    <button type="submit">Save User</button>
</form>