<h1>Customer Accounts</h1>
<a href="<?= base_url('customers/new') ?>">+ Add New Customer</a>
<br><br>
<table border="1" cellpadding="5">
    <thead>
        <tr><th>ID</th><th>Full Name</th><th>Email</th><th>Phone</th><th>Actions</th></tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= esc($customer['id']) ?></td>
                <td><?= esc($customer['full_name']) ?></td>
                <td><?= esc($customer['email']) ?></td>
                <td><?= esc($customer['phone']) ?></td>
                <td><a href="<?= base_url('customers/edit/' . $customer['id']) ?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>