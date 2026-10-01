<h1>Edit Customer</h1>
<?php if (isset($validation)): ?>
    <div style="color:red;"><?= $validation->listErrors() ?></div>
<?php endif; ?>

<form action="<?= base_url('customers/update/' . $customer['id']) ?>" method="post">
    <?= csrf_field() ?>
    <p>
        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="<?= esc($customer['full_name']) ?>">
    </p>
    <p>
        <label>Email:</label><br>
        <input type="email" name="email" value="<?= esc($customer['email']) ?>">
    </p>
    <p>
        <label>Phone:</label><br>
        <input type="text" name="phone" value="<?= esc($customer['phone']) ?>">
    </p>
    <button type="submit">Update Customer</button>
</form>