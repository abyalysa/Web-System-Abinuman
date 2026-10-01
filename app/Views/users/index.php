<h1>User Accounts</h1>
<a href="<?= base_url('users/new') ?>">+ Add New User</a>
<br><br>
<table border="1" cellpadding="5">
    <thead>
        <tr><th>Avatar</th><th>ID</th><th>Username</th><th>Full Name</th><th>Actions</th></tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <?php if (! empty($user['avatar']) && file_exists(FCPATH . 'uploads/avatars/' . $user['avatar'])): ?>
                        <img src="<?= base_url('uploads/avatars/' . esc($user['avatar'])) ?>" width="50" height="50" style="border-radius:50%; object-fit:cover;">
                    <?php else: ?>
                        <img src="https://via.placeholder.com/50?text=User" width="50" height="50" style="border-radius:50%;">
                    <?php endif; ?>
                </td>
                <td><?= esc($user['id']) ?></td>
                <td><?= esc($user['username']) ?></td>
                <td><?= esc($user['full_name']) ?></td>
                <td><a href="<?= base_url('users/edit/' . $user['id']) ?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>