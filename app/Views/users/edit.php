<h1>Edit User</h1>
<?php if (isset($validation)): ?>
    <div style="color:red;"><?= $validation->listErrors() ?></div>
<?php endif; ?>

<form action="<?= base_url('users/update/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <p>
        <label>Username:</label><br>
        <input type="text" name="username" value="<?= esc($user['username']) ?>">
    </p>
    <p>
        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="<?= esc($user['full_name']) ?>">
    </p>
    <p>
        <label>Profile Picture (JPG/PNG, Max 2MB):</label><br>
        <?php if (! empty($user['avatar'])): ?>
            <img src="<?= base_url('uploads/avatars/' . esc($user['avatar'])) ?>" width="80"><br>
        <?php endif; ?>
        <input type="file" name="avatar" accept="image/png, image/jpeg">
    </p>
    <button type="submit">Update User</button>
</form>