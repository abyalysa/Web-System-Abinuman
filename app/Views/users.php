<h1> User Accounts</h1>
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Username</th>
            <th>Full Name</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= esc($user['id']) ?></td>
                <td><?= esc($user['username']) ?></td>
                <td><?= esc($user['full_name']) ?></td>
                <td><?= esc($user['created_at']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
</table>
