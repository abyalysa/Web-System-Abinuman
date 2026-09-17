<h1> Customer Accounts</h1>
<table border="1" cellpadding="5">
    <thead>
        <tr><th>Full Name</th>
        <th>Email</th>
        <th>Age</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= esc($customer['full_name']) ?></td>
                <td><?= esc($customer['email']) ?></td>
                <td><?= esc($customer['age']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
</table>
