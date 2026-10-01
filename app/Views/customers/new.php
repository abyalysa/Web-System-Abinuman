<h1>Add New Customer</h1>
<?php if (isset($validation)): ?>
    <div style="color:red;"><?= $validation->listErrors() ?></div>
<?php endif; ?>

<form action="<?= base_url('customers/create') ?>" method="post">
    <?= csrf_field() ?>
    <p>
        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="<?= old('full_name') ?>">
    </p>
    <p>
        <label>Email:</label><br>
        <input type="email" name="email" value="<?= old('email') ?>">
    </p>
    <p>
        <label>Phone:</label><br>
        <input type="text" name="phone" value="<?= old('phone') ?>">
    </p>
    <button type="submit">Save Customer</button>
</form>