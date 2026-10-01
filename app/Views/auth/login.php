<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>POS System - Login</title>
<style>
       body { font-family: Arial, sans-serif; margin: 50px; }
       .login-box { width: 320px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
       .error { color: red; margin-bottom: 10px; }
</style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <?php if (session()->getFlashdata('error')): ?>
        <div class="error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <?php if (isset($validation)): ?>
        <div class="error"><?= $validation->listErrors() ?></div>
        <?php endif; ?>
        <form action="<?= base_url('login') ?>" method="post">
            <?= csrf_field() ?>
            <p>
                <label>Username</label><br>
                <input type="text" name="username" value="<?= old('username') ?>" style="width: 100%;">
            </p>
            <p>
                <label>Password</label><br>
                <input type="password" name="password" style="width: 100%;">
            </p>
            <button type="submit" style="width: 100%; padding: 8px;">Log In</button>
        </form>
    </div>
</body>
</html>