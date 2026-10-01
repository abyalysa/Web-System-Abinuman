<nav style="padding: 10px; background: #f4f4f4; margin-bottom: 20px;">
    <a href="<?= base_url('customers') ?>">Customers</a> |
    <a href="<?= base_url('users') ?>">Users</a>
    <?php if (session()->get('isLoggedIn')): ?>
        <span style="float: right;">
            Logged in as <strong><?= esc(session()->get('username')) ?></strong> |
            <a href="<?= base_url('logout') ?>">Logout</a>
        </span>
    <?php endif; ?>
</nav>
<hr>